<?php

use yii\db\Schema;
use yii\db\Migration;

class m150222_154457_Home_Details extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	 
    	// create tables. note the specific order
    	$this->createTable('{{%home_details}}', [
    			"id" => Schema::TYPE_PK,
    			"details_id" => Schema::TYPE_INTEGER . ' not null',
    			"details" => Schema::TYPE_STRING . ' not null',
    			"title" => Schema::TYPE_STRING . ' not null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	
    	// insert role data
    	$columns = ["details_id","details","title", "create_time"];
    	$this->batchInsert('{{%home_details}}', $columns, [
    			["1","home Type","آپارتمان", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","ویلا - خانه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","مغازه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","زمین - کلنگی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","املاک کشاورزی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","کارخانه و کارگاه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","دامداری و دامپروری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["1","home Type","مجتمع آپارتمانی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["2","Bargain Type","مسکونی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","تجاری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","اداری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","موقعیت اداری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","مسکونی ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","صنعتی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["2","Bargain Type","مزروعی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["3","Area","تا 50 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","50 تا 75 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","75 تا 100 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","100 تا 150 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","150 تا 200 متر ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","200 تا 250 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","250 تا 300 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["3","Area","بالای 300 متر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["4","Total Price","قیمت روز", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","تا 50 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","50 تا 100 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","100 تا 200 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","200 تا 300 میلیون ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","300 تا 400 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","400 تا 500 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","500 تا 600 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","600 تا 700 میلیون", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","700 تا 1 میلیارد", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["4","Total Price","1 میلیارد به بالا", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["5","Kitchen Cabinets","MDF", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["5","Kitchen Cabinets","آبدار خانه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["5","Kitchen Cabinets","چوبی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["5","Kitchen Cabinets","فلزی طرح چوب", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["5","Kitchen Cabinets","فایبر گلاس", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["6","WC","ایرانی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["6","WC","فرنگی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["6","wc","ایرانی - فرنگی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["7","Flooring","HDF", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["7","Flooring","پارکت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["7","Flooring","سرامیک", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["7","Flooring","موکت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["7","Flooring","کاشی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["8","View","آجر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","آجر سه سانت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","آلمینیوم", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","رفلکس", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","رومی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","گرانیت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","کامپوزیت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","کلاسیک", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","سنگ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["8","View","سیمان", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["9","Residence status","مالک", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["9","Residence status","مستاجر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["9","Residence status","تخلیه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["10","Type Villa","یک طبقه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["10","Type Villa","دو طبقه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["10","Type Villa","دوبلکس", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["10","Type Villa","تریبلکس", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["10","Type Villa","دوقلو", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["10","Type Villa","سه قلو", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			
    			["11","Facilities","شوفاژ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","چیلر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","فن کوئل", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","پکیچ", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","کولر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","استخر", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","سونا", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","جکوزی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","آسانسور", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","باربیکیو", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","آیفون تصویری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","دوربین مدار بسته", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","درب ریموت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","آنتن مرکزی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","اینترنت مرکزی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","حیاط خلوت", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","فضای سبز", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","لابی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","سالن اجتماعات", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","سرایداری", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","پاسیو", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","نیمه مبله", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","مبله", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","اطفاء حریق", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","شوتینگ زباله", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","انبار", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","بالکن", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["11","Facilities","شومینه", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["12","Location","شمالی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Location","جنوبی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Location","شرقی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Location","غربی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			["12","Home Old","نوساز", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Home Old","قدیمی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Home Old","باز سازی شده", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			["12","Home Old","غربی", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			 
    	]);
    }

    public function down()
    {
		$this->dropTable('{{%home_details}}');
    }
}
