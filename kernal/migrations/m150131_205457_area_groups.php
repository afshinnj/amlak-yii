<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_205457_area_groups extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	
    	// create tables. note the specific order
    	$this->createTable('area_groups', [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	 
    	// insert role data
    	$columns = ["title", "create_time"];
    	$this->batchInsert('area_groups', $columns, [
    			["تا 50 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["50 تا 75 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["75 تا 100 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["100 تا 150 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["150 تا 200 متر ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["200 تا 250 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["250 تا 300 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بالای 300 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
        echo "m150131_205457_area_groups cannot be reverted.\n";

        return false;
    }
}
