<?php

use yii\db\Schema;
use yii\db\Migration;

class m150318_114736_request_sale_home extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        // create tables. note the specific order
        $this->createTable('{{%request_home}}', [
            "id" => Schema::TYPE_PK,
            "request_code" => Schema::TYPE_INTEGER . ' null default null',
            "user_id" => Schema::TYPE_INTEGER . ' null default null',
            "state_id" => Schema::TYPE_INTEGER . '  null default null',
            "city_id" => Schema::TYPE_INTEGER . ' null default null',
            "zone_id" => Schema::TYPE_INTEGER . ' null default null',
            "home_type" => Schema::TYPE_STRING . ' null default null',
            "doc_type" => Schema::TYPE_STRING . ' null default null',
            "contract_type" => Schema::TYPE_INTEGER . ' null default null',
            "metr" => Schema::TYPE_STRING . ' null default null',
            "total_price" => Schema::TYPE_STRING . ' null default null',
            "price_rent" => Schema::TYPE_STRING . ' null default null',
            "rent" => Schema::TYPE_STRING . ' null default null',
            "description" => Schema::TYPE_STRING . ' null default null',
            "create_time" => Schema::TYPE_DATETIME . ' null default null',
            "update_time" => Schema::TYPE_DATETIME . ' null default null',
                ], $tableOptions);

        $this->createTable('{{%home_general_Info}}', [
            "id" => Schema::TYPE_PK,
            "sale_code" => Schema::TYPE_INTEGER . ' null default null',
            "user_id" => Schema::TYPE_INTEGER . ' null default null',
            "state_id" => Schema::TYPE_STRING . '  null default null',
            "city_id" => Schema::TYPE_STRING . ' null default null',
            "zone_id" => Schema::TYPE_STRING . ' null default null',
            "contract_type" => Schema::TYPE_STRING . ' null default null',
            "home_type" => Schema::TYPE_STRING . ' null default null',
            "doc_type" => Schema::TYPE_STRING . ' null default null',
            "owner_name" => Schema::TYPE_STRING . ' null default null',
            "owner_email" => Schema::TYPE_STRING . ' null default null',
            "address_home" => Schema::TYPE_STRING . ' null default null',
            "no_home" => Schema::TYPE_STRING . ' null default null',
            "mobile" => Schema::TYPE_STRING . ' null default null',
            "tell" => Schema::TYPE_STRING . ' null default null',
            "tell1" => Schema::TYPE_STRING . ' null default null',
            "create_time" => Schema::TYPE_DATETIME . ' null default null',
            "update_time" => Schema::TYPE_DATETIME . ' null default null',
                ], $tableOptions);

        $this->createTable('{{%apartments_Info}}', [
            "id" => Schema::TYPE_PK,
            "user_id" => Schema::TYPE_INTEGER . ' null default null',
            "home_general_Info_id" => Schema::TYPE_INTEGER . ' null default null',
            "Infrastructure" => Schema::TYPE_STRING . ' null default null', //زیربنای کل
            "metr" => Schema::TYPE_STRING . ' null default null', //مساحت زمین	
            "rooms" => Schema::TYPE_STRING . ' null default null', //تغداد اتاق
            "floor" => Schema::TYPE_STRING . ' null default null', //طبقه
            "floors" => Schema::TYPE_STRING . ' null default null', //تعداد طبقات
            "unit" => Schema::TYPE_STRING . ' null default null', //تعداد واحد در طبقه
            "units" => Schema::TYPE_STRING . ' null default null', //جمع واحد ها
            "view" => Schema::TYPE_STRING . ' null default null', //نما
            "r_status" => Schema::TYPE_STRING . ' null default null', //وضعیت سکونت
            "old_home" => Schema::TYPE_STRING . ' null default null', //سن بنا
            "location" => Schema::TYPE_STRING . ' null default null', //موقعیت جغرافیائی
            "description" => Schema::TYPE_STRING . ' null default null',
            "cabinets" => Schema::TYPE_STRING . ' null default null', //کابینت
            "wc" => Schema::TYPE_STRING . ' null default null', //سرویس بهداشتی
            "flooring" => Schema::TYPE_STRING . ' null default null',
            "price_metr" => Schema::TYPE_STRING . ' null default null',
            "price_all" => Schema::TYPE_STRING . ' null default null',
            "parking" => Schema::TYPE_STRING . ' null default null',
            "tell" => Schema::TYPE_STRING . ' null default null',
            "loan" => Schema::TYPE_STRING . ' null default null',
            "facilities" => Schema::TYPE_STRING . ' null default null', //امکانات
            "create_time" => Schema::TYPE_DATETIME . ' null default null',
            "update_time" => Schema::TYPE_DATETIME . ' null default null',
                ], $tableOptions);

        // create tables. note the specific order
        $this->createTable('{{%home_images}}', [
            "id" => Schema::TYPE_PK,
            "home_id" => Schema::TYPE_INTEGER . ' null default null',
            'filename' => Schema::TYPE_STRING . ' null default null',
            'type' => Schema::TYPE_STRING . ' null default null',
            'url' => Schema::TYPE_TEXT . ' null default null',
            'alt' => Schema::TYPE_TEXT. ' null default null',
            'size' => Schema::TYPE_STRING . ' null default null',
            'description' => Schema::TYPE_TEXT. ' null default null',
            'thumbs' => Schema::TYPE_TEXT. ' null default null',
            'owner_id' => Schema::TYPE_INTEGER . ' null default null',
            "create_time" => Schema::TYPE_DATETIME . ' null default null',
            "update_time" => Schema::TYPE_DATETIME . ' null default null',
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('{{%request_home}}');
        $this->dropTable('{{%home_general_Info}}');
        $this->dropTable('{{%apartments_Info}}');
        $this->dropTable('{{%home_images}}');
    }

}
