<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_205329_bargain_type extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable('bargain_type', [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["title", "create_time"];
    	$this->batchInsert('bargain_type', $columns, [
    			["مسکونی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تجاری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اداری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["موقعیت اداری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مسکونی ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["صنعتی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مزروعی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
        echo "m150131_205329_bargain_type cannot be reverted.\n";

        return false;
    }
}
