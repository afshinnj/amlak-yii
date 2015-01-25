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
            'title' => 'Title',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'admin_language' => 'Admin Language',
            'site_language' => 'Site Language',
            'site_off' => 'Site Off',
        	'site_off_description' => 'Site Off Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
