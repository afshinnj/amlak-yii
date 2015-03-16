<?php

namespace app\modules\backup\controllers;

use Yii;
use yii\web\Controller;
use app\modules\backup\models\UploadForm;
use yii\data\ArrayDataProvider;
use yii\web\Request;
use yii\web\UploadedFile;

class DefaultController extends Controller
{
	public $menu = [];
	public $tables = [];
	public $fp ;
	public $file_name;
	public $_path = null;
	public $back_temp_file = 'db_backup_';

	public function init()
	{
		// check for admin permission (`tbl_role.can_admin`)
		// note: check for Yii::$app->user first because it doesn't exist in console commands (throws exception)
		if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
				$this->redirect(['/login']);
          }
	
		parent::init();
	}
	protected function getPath()
	{
		if ( isset ($this->module->path )) $this->_path = $this->module->path;
		else $this->_path = Yii::$app->basePath .'/_backup/';

		if ( !file_exists($this->_path ))
		{
			@mkdir($this->_path, 777);
			@chmod($this->_path, '777');
		}
		return $this->_path;
	}
	public function execSqlFile($sqlFile)
	{
		$message = "ok";

		if ( file_exists($sqlFile))
		{
			$sqlArray = file_get_contents($sqlFile);

			 $cmd = Yii::$app->db->createCommand($sqlArray);
			try	{
				$cmd->execute();
			}
			catch(CDbException $e)
			{
				$message = $e->getMessage();
			}

		}
		return $message;
	}
	public function getColumns($tableName)
	{
		$sql = 'SHOW CREATE TABLE '.$tableName;
		$cmd = Yii::$app->db->createCommand($sql);
		$table = $cmd->queryOne();

		$create_query = $table['Create Table'] . ';';

		$create_query  = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $create_query);
		$create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
		if ( $this->fp)
		{
			$this->writeComment('TABLE `'. addslashes ($tableName) .'`');
			$final = 'DROP TABLE IF EXISTS `' .addslashes($tableName) . '`;'.PHP_EOL. $create_query .PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['create'] = $create_query;
			return $create_query;
		}
	}
	public function getData($tableName)
	{
		$sql = 'SELECT * FROM '.$tableName;
		$cmd = Yii::$app->db->createCommand($sql);
		$dataReader = $cmd->query();

		$data_string = '';

		foreach($dataReader as $data)
		{
			$itemNames = array_keys($data);
			$itemNames = array_map("addslashes", $itemNames);
			$items = join('`,`', $itemNames);
			$itemValues = array_values($data);
			$itemValues = array_map("addslashes", $itemValues);
			$valueString = join("','", $itemValues);
			$valueString = "('" . $valueString . "'),";
			$values ="\n" . $valueString;
			if ($values != "")
			{
				$data_string .= "INSERT INTO `$tableName` (`$items`) VALUES" . rtrim($values, ",") . ";" . PHP_EOL;
			}
		}

		if ( $data_string == '')
			return null;

		if ( $this->fp)
		{
			$this->writeComment('TABLE DATA '.$tableName);
			$final = $data_string.PHP_EOL.PHP_EOL.PHP_EOL;
			fwrite ( $this->fp, $final );
		}
		else
		{
			$this->tables[$tableName]['data'] = $data_string;
			return $data_string;
		}
	}
	public function getTables($dbName = null)
	{
		$sql = 'SHOW TABLES';
		$cmd = Yii::$app->db->createCommand($sql);
		$tables = $cmd->queryColumn();
		return $tables;
	}
	public function StartBackup($addcheck = true)
	{
		$this->file_name =  $this->path . $this->back_temp_file . date('Y-m-d_H:i:s') . '.sql';

		$this->fp = fopen( $this->file_name, 'w+');

		if ( $this->fp == null )
			return false;
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		if ( $addcheck )
		{
			fwrite ( $this->fp,  'SET AUTOCOMMIT=0;' .PHP_EOL );
			fwrite ( $this->fp,  'START TRANSACTION;' .PHP_EOL );
			fwrite ( $this->fp,  'SET SQL_QUOTE_SHOW_CREATE = 1;'  .PHP_EOL );
		}
		fwrite ( $this->fp, 'SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, 'SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;'.PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('START BACKUP');
		return true;
	}
	public function EndBackup($addcheck = true)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, 'SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;'.PHP_EOL );
		fwrite ( $this->fp, 'SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;'.PHP_EOL );

		if ( $addcheck )
		{
			fwrite ( $this->fp,  'COMMIT;' .PHP_EOL );
		}
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		$this->writeComment('END BACKUP');
		fclose($this->fp);
		$this->fp = null;
	}
	public function writeComment($string)
	{
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
		fwrite ( $this->fp, '-- '.$string .PHP_EOL );
		fwrite ( $this->fp, '-- -------------------------------------------'.PHP_EOL );
	}
	public function actionCreate()
	{
		$tables = $this->getTables();

		if(!$this->StartBackup())
		{
			//render error
			Yii::$app->user->setFlash('success', "Error");
			return $this->render('index');
		}

		foreach($tables as $tableName)
		{
			$this->getColumns($tableName);
		}
		foreach($tables as $tableName)
		{
			$this->getData($tableName);
		}
		$this->EndBackup();

		$this->redirect(['/backup']);
	}

	public function actionDelete($file = null)
	{

		$dataArray = array();
		
		$list_files = glob($this->path .'*.sql');
		if ($list_files )
		{
			$list = array_map('basename',$list_files);
			rsort($list);
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename($filename);
				$dataArray[] = $columns;
			}
		}

		if(isset($dataArray[(int)$file]['name'])){
			
			unlink($this->path.$dataArray[(int)$file]['name']);
		}

		$this->redirect(['/backup']);
	}

	public function actionIndex()
	{

		$path = $this->path;
		$dataArray = array();

		$list_files = glob($path .'*.sql');
		if ($list_files )
		{
			
			$list = array_map('basename',$list_files);
			rsort($list);
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename ( $filename);
				$columns['size'] = filesize ( $path. $filename);
				$columns['create_time'] = date('Y-m-d H:i:s', filectime($path .$filename));
				$columns['modified_time'] = Yii::$app->formatter->asRelativeTime(date('Y-m-d H:i:s', filectime($path .$filename)));

				$dataArray[] = $columns;
			}
		}

		return $this->render('index', array(
				'dataProvider' => $dataArray,
		));
	}

	public function actionRestore($file = null)
	{

		$dataArray = array();
		
		$list_files = glob($this->path .'*.sql');
		if ($list_files )
		{
			$list = array_map('basename',$list_files);
			rsort($list);
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename($filename);
				$dataArray[] = $columns;
			}
		}
		

		if(isset($dataArray[(int)$file]['name']))
		{
			
			$this->execSqlFile($this->path.$dataArray[(int)$file]['name']);
		}
		
		$this->redirect(['/backup']);

	}

	public function actionDownload($file = null)
	{
		$dataArray = array();
		
		$list_files = glob($this->path .'*.sql');
		if ($list_files )
		{
			$list = array_map('basename',$list_files);
			rsort($list);
			foreach ( $list as $id=>$filename )
			{
				$columns = array();
				$columns['id'] = $id;
				$columns['name'] = basename($filename);
				$dataArray[] = $columns;
			}
		}

		if(isset($dataArray[(int)$file]['name']))
		{
			Yii::$app->response->sendFile($this->path.$dataArray[(int)$file]['name']);
		}
		
	}

	public function actionUpload()
	{
		$model= new UploadForm();
		if(isset($_POST['UploadForm']))
		{
			$model->attributes = $_POST['UploadForm'];
			$model->upload_file = UploadedFile::getInstance($model,'upload_file');
			if($model->upload_file->saveAs($this->path . $model->upload_file))
			{
				// redirect to success page
				return $this->redirect(array('index'));
			}
		}
		return $this->render('upload',array('model'=>$model));
	}	
	
}
