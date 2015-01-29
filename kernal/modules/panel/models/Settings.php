<?php

namespace app\modules\panel\models;

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
class Settings extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return static::getDb()->tablePrefix . 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_language', 'site_language', 'site_off'], 'required'],
            [['site_off'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'email', 'telephone', 'description', 'keywords', 'admin_language', 'site_language','site_off_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('panel','Title Site'),
            'email' => Yii::t('panel','Email'),
            'telephone' => Yii::t('panel','Telephone'),
            'description' => Yii::t('panel','Description'),
            'keywords' => Yii::t('panel','Keywords'),
            'admin_language' => Yii::t('panel','Admin Language'),
            'site_language' => Yii::t('panel','Site Language'),
            'site_off' => Yii::t('panel','Site Off'),
        	'site_off_description' => Yii::t('panel','Site Off Description'),
            'create_time' => Yii::t('panel','Create Time'),
            'update_time' => Yii::t('panel','Update Time'),
        	'site_off_description' => Yii::t('panel','Site Off Description'),
        	'site_off_lable' => Yii::t('panel','Site Off Description'),
        ];
    }
    public function behaviors()
    {
    	return [
    			'timestamp' => [
    					'class'      => 'yii\behaviors\TimestampBehavior',
    					'value'      => function () { return Yii::$app->jdate->date('Y-m-d H:i:s'); },
    					'attributes' => [
    							ActiveRecord::EVENT_BEFORE_INSERT => 'create_time',
    							ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
    					],
    				],
    		];
    }
}
