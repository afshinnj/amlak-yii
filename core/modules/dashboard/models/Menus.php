<?php

namespace app\modules\dashboard\models;

use Yii;

/**
 * This is the model class for table "{{%menus}}".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $parent_id
 * @property string $title
 * @property string $url
 * @property string $section
 * @property string $create_time
 * @property string $update_time
 *
 * @property Menus $parent
 * @property Menus[] $menuses
 * @property Role $role
 */
class Menus extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return static::getDb()->tablePrefix . 'menus';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['role_id', 'title', 'section'], 'required'],
            [['role_id', 'parent_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'url', 'section'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'url' => 'Url',
            'section' => 'Section',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(Menus::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuses() {
        return $this->hasMany(Menus::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole() {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

}
