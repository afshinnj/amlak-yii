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
    			"parent_id" => Schema::TYPE_INTEGER . ' null default null',
    			"title" => Schema::TYPE_STRING . ' not null',
    			"url" => Schema::TYPE_STRING . ' null default null',
    			"section" => Schema::TYPE_STRING . ' not null',
    			"icon" => Schema::TYPE_STRING . ' null default null',
    			"create_time" => Schema::TYPE_DATETIME . ' null default null',
    			"update_time" => Schema::TYPE_DATETIME . ' null default null',
    	], $tableOptions);
    	 
    	// add foreign keys for data integrity
    	$this->addForeignKey(Menus::tableName()."_role_id", Menus::tableName(), "role_id", Role::tableName(), "id");
    	$this->addForeignKey(Menus::tableName()."_parent_id", Menus::tableName(), "parent_id", Menus::tableName(), "id");
    	
    	// insert role data
    	$columns = ["role_id", "parent_id", "title", "url" ,"section", "icon","create_time"];
    	$this->batchInsert(Menus::tableName(), $columns, [
    			[1, null, "Settings", "", "panel", "fa-wrench", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 1, "Pages", "pages", "panel","", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 1, "Setting", "settings", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],

    			[1, null, "Registration-location", "", "panel", "fa-globe", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 4, "State", "State-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 4, "Sub-State", "City-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 4, "Zone", "Zone-List", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[1, null, "Registration-variable", "", "panel", "fa-home", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 8, "Home-Type", "Home-Type", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 8, "Bargain-Type", "Bargain-Type", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 8, "Total-Price", "Total-Price", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 8, "Area-Groups", "Area-Groups", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[1, null, "User", "", "panel", "fa-user", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 13, "Change-Password", "change-password", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 13, "Change-Profile", "change-profile", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[1, 13, "Change-Avatar", "change-avatar", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			[2, null, "User", "", "panel", "fa-user", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[2, 17, "Change-Password", "change-password", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[2, 17, "Change-Profile", "change-profile", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			[2, 17, "Change-Avatar", "change-avatar", "panel", "", Yii::$app->jdate->date('Y-m-d H:i:s')],
    			
    			 
    			
    	]);
    }

    public function down()
    {
		$this->dropTable(Menus::tableName());
    }
}
