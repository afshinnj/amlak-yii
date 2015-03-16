<?php

use yii\db\Schema;
use yii\db\Migration;
use  app\modules\dashboard\models\Menus;
use app\modules\user\models\Role;
use yii\widgets\Menu;


class m150226_144019_menus extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	
    	// create tables. note the specific order
    	$this->createTable(Menus::tableName(), [
    			"id" => Schema::TYPE_PK,
    			"role_id" => Schema::TYPE_INTEGER . ' not null',
    			"parent_id" => Schema::TYPE_INTEGER . ' not null default 0',
    			"title" => Schema::TYPE_STRING . ' not null',
    			"url" => Schema::TYPE_STRING . ' null default null',
    			"section" => Schema::TYPE_STRING . ' not null',
    			"icon" => Schema::TYPE_STRING . ' null default null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	 
    	# متغیر های منو ها
    	$admin_menus = 1;
    	$user_menus = 2;
    	
    	$Settings_id = 1;
    	$Registration_location_id = 6;
		$Registration_variable_id = 10;
		$User_id_admin = 15;
		$User_id_user = 20;
		$Registration_home_id_user = 27;
		$Registration_home_id_admin = 29;
		
    	   // insert role data
    	$columns = ["role_id", "parent_id", "title", "url" ,"section", "icon","create_time"];
    	$this->batchInsert(Menus::tableName(), $columns, [
    			[$admin_menus, 0, "Settings", "", "panel", "fa-wrench", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Settings_id, "Pages", "pages", "panel","", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Settings_id, "Setting", "settings", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Settings_id, "Backup", "backup", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Settings_id, "File-Manager", "media-file", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],

    			[$admin_menus, 0, "Registration-location", "", "panel", "fa-globe", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_location_id, "State", "State-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_location_id, "Sub-State", "City-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_location_id, "Zone", "Zone-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[$admin_menus, 0, "Registration-variable", "", "panel", "fa-home", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_variable_id, "Home-Type", "Home-Type", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_variable_id, "Bargain-Type", "Bargain-Type", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_variable_id, "Total-Price", "Total-Price", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_variable_id, "Area-Groups", "Area-Groups", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[$admin_menus, 0, "User", "", "panel", "fa-user", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $User_id_admin, "Change-Password", "change-password", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $User_id_admin, "Change-Profile", "change-profile", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $User_id_admin, "Change-Avatar", "change-avatar", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $User_id_admin, "Change-Email", "change-email", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[$admin_menus, 0, "Registration-home", "", "panel", "fa-home", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_home_id_admin, "Request-Home", "Request-home", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$admin_menus, $Registration_home_id_admin, "Registr-Home", "registr-home", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],  
    			  			
    			[$user_menus, 0, "User", "", "panel", "fa-user", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $User_id_user, "Change-Password", "change-password", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $User_id_user, "Change-Profile", "change-profile", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $User_id_user, "Change-Avatar", "change-avatar", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $User_id_user, "Change-Email", "change-email", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $User_id_user, "File-Manager", "media-file", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[$user_menus, 0, "Registration-home", "", "panel", "fa-home", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $Registration_home_id_user, "Request-Home", "Request-home", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[$user_menus, $Registration_home_id_user, "Registr-Home", "registr-home", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],

    			
    			 
    			
    	]);
    }

    public function down()
    {
		$this->dropTable(Menus::tableName());
    }
}
