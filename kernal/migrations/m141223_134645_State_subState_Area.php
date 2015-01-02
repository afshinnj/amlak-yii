<?php

use yii\db\Schema;
use yii\db\Migration;

class m141223_134645_State_subState_Area extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	
    	// create tables. note the specific order
    	$this->createTable('state', [
    			"id" => Schema::TYPE_PK,
    			"name" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	$this->createTable('substate', [
    			"id" => Schema::TYPE_PK,
    			"name" => Schema::TYPE_STRING . ' not null',
    			"state_id" => Schema::TYPE_INTEGER . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	$this->createTable('area', [
    			"id" => Schema::TYPE_PK,
    			"name" => Schema::TYPE_STRING . ' not null',
    			"substate_id" => Schema::TYPE_INTEGER . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// add foreign keys for data integrity
    	$this->addForeignKey('substate' . "_state_id", 'substate', "state_id", 'state', "id");
    	$this->addForeignKey('area' . "_substate_id", 'area', "substate_id", 'substate', "id");
    }

    public function down()
    {

    }
}
