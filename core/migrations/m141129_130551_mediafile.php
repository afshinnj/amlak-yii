<?php

use yii\db\Schema;
use yii\db\Migration;

class m141129_130551_mediafile extends Migration
{
    public function up()
    {
        $this->createTable('{{%mediafile}}', [
            'id' => 'pk',
            'filename' => Schema::TYPE_STRING . ' NOT NULL',
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'url' => Schema::TYPE_TEXT . ' NOT NULL',
            'alt' => Schema::TYPE_TEXT,
            'size' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'thumbs' => Schema::TYPE_TEXT,
        	'owner_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER,
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%mediafile}}');
    }
}
