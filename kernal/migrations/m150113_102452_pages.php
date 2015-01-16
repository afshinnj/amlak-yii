<?php

use yii\db\Schema;
use yii\db\Migration;

class m150113_102452_pages extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable('pages', [
    			"id" => Schema::TYPE_PK,
    			"title" => Schema::TYPE_STRING . ' not null',
    			"text" => Schema::TYPE_TEXT . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["title", "text", "create_time"];
    	$this->batchInsert('pages', $columns, [
    			["صفحه ورود", "صفحه ورود",  date("Y-m-d H:i:s")],
    			["صفحه ثبت نام ", "صفحه ثبت نام", date("Y-m-d H:i:s")],
    			["درباره ما", "درباره ما", date("Y-m-d H:i:s")],
    			["تماس با ما", "تماس با ما", date("Y-m-d H:i:s")],
    	]);
    }

    public function down()
    {
         $this->dropTable('pages');
    }
}
