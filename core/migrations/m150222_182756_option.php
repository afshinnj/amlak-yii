<?php

use yii\db\Schema;
use yii\db\Migration;

class m150222_182756_option extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable('{{%option}}', [
    			"id" => Schema::TYPE_PK,
    			"option_id" => Schema::TYPE_INTEGER . ' not null',
    			"option_name" => Schema::TYPE_STRING . ' not null',
    			"option_title" => Schema::TYPE_STRING . ' not null',
    			"option_value" => Schema::TYPE_STRING . ' null default null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["option_id", "option_name","option_title","option_value","create_time"];
    	$this->batchInsert('{{%option}}', $columns, [
    			["1","setting", "title","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "email","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "telephone","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "description","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "keywords","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "admin_language","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "site_language","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","setting", "site_off_description","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["2","page", "login","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","page", "Sign up","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","page", "about","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","page", "contact","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			

    	]);
    }

    public function down()
    {
         $this->dropTable('{{%option}}');
    }
}
