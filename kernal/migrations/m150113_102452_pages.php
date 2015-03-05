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
    			"title_en" => Schema::TYPE_STRING . ' not null',
    			"text" => Schema::TYPE_TEXT . ' not null',
    			"keyword" => Schema::TYPE_STRING . ' null default null',
    			"captcha_count" => Schema::TYPE_SMALLINT . ' not null default 5',
    			"captcha_show" => Schema::TYPE_SMALLINT . ' not null default 1',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["title","title_en", "text", "create_time"];
    	$this->batchInsert(Pages::tableName(), $columns, [
    			["صفحه ورود", "Login","صفحه ورود",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["صفحه ثبت نام", "SignUp","صفحه ثبت نام", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["درباره ما","About", "درباره ما", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تماس با ما","Contact", "تماس با ما", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
         $this->dropTable(Pages::tableName());
    }
}
