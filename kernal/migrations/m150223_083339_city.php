<?php

use yii\db\Schema;
use yii\db\Migration;
use  app\modules\dashboard\models\City;

class m150223_083339_city extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	
    	// create tables. note the specific order
    	$this->createTable(City::tableName(), [
    			"id" => Schema::TYPE_PK,
    			"name" => Schema::TYPE_STRING . ' not null',
    			"state_id" => Schema::TYPE_INTEGER . ' null default null',
    			"city_id" => Schema::TYPE_INTEGER . ' null default null',
    			"state" => Schema::TYPE_INTEGER . ' not null default 0',
    			"city" => Schema::TYPE_INTEGER . ' not null default 0',
    			"area" => Schema::TYPE_INTEGER . ' not null default 0',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	
    	// add foreign keys for data integrity RESTRICT and CASCADE
    	$this->addForeignKey(City::tableName().'_state_id', City::tableName(), "state_id", City::tableName(), "id");
    	$this->addForeignKey(City::tableName().'_city_id', City::tableName(), "city_id", City::tableName(), "id");

    }

    public function down()
    {
		$this->dropTable(City::tableName());   	
    	
    }
}
