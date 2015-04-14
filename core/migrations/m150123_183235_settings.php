<?php

use yii\db\Schema;
use yii\db\Migration;
use  app\modules\dashboard\models\Settings;

class m150123_183235_settings extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable(Settings::tableName(), [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' null default null',
    			"email" => Schema::TYPE_STRING . ' null default null',
    			"telephone" => Schema::TYPE_STRING . ' null default null',
    			"description" => Schema::TYPE_STRING . ' null default null',
    			"keywords" => Schema::TYPE_STRING . ' null default null',
    			"admin_language" => Schema::TYPE_STRING . ' not null',
    			"site_language" => Schema::TYPE_STRING . ' not null',
    			"site_off" => Schema::TYPE_SMALLINT. ' not null',
    			"site_off_description" => Schema::TYPE_TEXT . ' null default null',
    			"email_confirmation" => Schema::TYPE_SMALLINT. ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["site_off", "admin_language", "site_language","email_confirmation","create_time"];
    	$this->batchInsert(Settings::tableName(), $columns, [
    			[1, "fa-IR", "fa-IR","1", Yii::$app->jdate->date('Y-m-d H:i:s')],

    	]);
    }

    public function down()
    {
         $this->dropTable(Settings::tableName());
    }
}
