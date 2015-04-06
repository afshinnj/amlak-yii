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
    	
    	$columns = ["name","state_id", "city_id","state","city","area", "create_time"];
    	$this->batchInsert(City::tableName(), $columns, [
    			["آذربايجان شرقي", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["آذربايجان غربی", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اردبیل", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اصفهان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ایلام", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بوشهر", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تهران", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["چهارمحال بختياري", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["خراسان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["خوزستان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["زنجان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["سمنان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["سیستان و بلوچستان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["چهارمحال بختياري", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["فارس", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["قزوین", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["قم", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کردستان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کرمان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کرمانشاه", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["كهكيلويه و بويراحمد", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["گلستان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["گیلان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["لرستان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مازندران", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مرکزی", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هرمزگان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["همدان", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["یزد", "","","1","","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["اردبیل", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["آبی‌بیگلو", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اصلاندوز", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بیله‌سوار", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["پارس آباد", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["خلخال", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مشکین شهر", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["نمین", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["نیر", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هیر", "3","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["شهرضا", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مبارکه", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["لنجان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دیزیچه لنجان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["فلاورجان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["نجف‌ آباد", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اردستان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["گلپایگان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["نطنز", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["سمیرم", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کاشان", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["خمینی‌ شهر", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["فریدون‌ شهر", "4","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["ایلام", "5","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دهلران", "5","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مهران", "5","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			
    			["مراغه", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بناب", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["مرند", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کلیبر", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کلیبر", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هشترود", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ملکان", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["آذرشهر", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اسکو", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["سراب", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تبریز", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["شبستر", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هریس", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هریس", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ورزقان", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["جلفا", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بستان‌آباد", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["عجب‌شیر", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["هشترود", "1","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["سردشت", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تکاب", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["بوکان", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["شاهین‌ دژ", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["نقده", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["میاندوآب", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["اشنویه", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ارومیه", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["سلماس", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["خوی", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["چایپاره", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["ماکو", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["پلدشت", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["پیرانشهر", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["چالدران", "2","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["بوشهر", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["جم", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["تنگستان", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دشتستان", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دشتی", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دیر", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["دیلم", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["کنگان", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["گناوه", "6","","","1","",  Yii::$app->jdate->date('Y-m-d H:i:s')],
    			

    			

    	]);

    }

    public function down()
    {
		$this->dropTable(City::tableName());   	
    	
    }
}
