<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $title
 * @property string $email
 * @property string $telephone
 * @property string $description
 * @property string $keywords
 * @property string $admin_language
 * @property string $site_language
 * @property integer $site_off
 * @property integer $site_off_description
 * @property string site_off_lable
 * @property string $create_time
 * @property string $update_time
 */
class Settings extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return static::getDb()->tablePrefix . 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['admin_language', 'site_language', 'site_off'], 'required'],
            [['email'], 'email'],
            [['telephone'], 'integer'],
            [['site_off'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'email', 'telephone', 'description', 'keywords', 'admin_language', 'site_language', 'site_off_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => Yii::t('dashboard', 'Title Site'),
            'email' => Yii::t('dashboard', 'Email'),
            'telephone' => Yii::t('dashboard', 'Telephone'),
            'description' => Yii::t('dashboard', 'Description'),
            'keywords' => Yii::t('dashboard', 'Keywords'),
            'admin_language' => Yii::t('dashboard', 'Admin Language'),
            'site_language' => Yii::t('dashboard', 'Site Language'),
            'site_off' => Yii::t('dashboard', 'Site Off'),
            'create_time' => Yii::t('dashboard', 'Create Time'),
            'update_time' => Yii::t('dashboard', 'Update Time'),
            'site_off_description' => Yii::t('dashboard', 'Site Off Description Text'),
            'site_off_lable' => Yii::t('dashboard', 'Site Off Description'),
        ];
    }

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => function () {
                    return Yii::$app->jdate->date('Y-m-d H:i:s');
                },
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'create_time',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
                ],
            ],
        ];
    }

}
