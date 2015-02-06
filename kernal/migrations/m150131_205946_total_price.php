<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_205946_total_price extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable('total_price', [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["title", "create_time"];
    	$this->batchInsert('total_price', $columns, [
    			["قیمت روز", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تا 50 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["50 تا 100 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["100 تا 200 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["200 تا 300 میلیون ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["300 تا 400 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["400 تا 500 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["500 تا 600 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["600 تا 700 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["700 تا 1 میلیارد", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1 میلیارد به بالا", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
        echo "m150131_205946_total_price cannot be reverted.\n";

        return false;
    }
}
