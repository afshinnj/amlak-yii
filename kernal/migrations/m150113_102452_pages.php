<?php

use yii\db\Schema;
use yii\db\Migration;
use  app\modules\dashboard\models\Pages;

class m150113_102452_pages extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable(Pages::tableName(), [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"text" => Schema::TYPE_TEXT . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["title", "text", "create_time"];
    	$this->batchInsert(Pages::tableName(), $columns, [
    			["صفحه ورود", "صفحه ورود",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["صفحه ثبت نام ", "صفحه ثبت نام", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["درباره ما", "درباره ما", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تماس با ما", "تماس با ما", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
         $this->dropTable(Pages::tableName());
    }
}
