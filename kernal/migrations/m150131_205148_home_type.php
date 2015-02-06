<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_205148_home_type extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	
    	// create tables. note the specific order
    	$this->createTable('home_type', [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	 
    	// insert role data
    	$columns = ["title", "create_time"];
    	$this->batchInsert('home_type', $columns, [
    			["آپارتمان", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ویلا - خانه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مغازه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["زمین - کلنگی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["املاک کشاورزی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کارخانه و کارگاه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دامداری و دامپروری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مجتمع آپارتمانی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    	]);
    }

    public function down()
    {
        echo "m150131_205148_home_type cannot be reverted.\n";

        return false;
    }
}
