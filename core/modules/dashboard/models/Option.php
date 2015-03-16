<?php

namespace app\modules\dashboard\models;

use Yii;

/**
 * This is the model class for table "{{%option}}".
 *
 * @property integer $id
 * @property integer $option_id
 * @property string $option_name
 * @property string $option_title
 * @property string $option_value
 * @property string $create_time
 * @property string $update_time
 * @property string $site_off
 */
class Option extends \yii\db\ActiveRecord
{
	public $site_off;
	public $site_off_description;
	public $title;
	public $email;
	public $telephone;
	public $description;
	public $keywords;
	public $admin_language;
	public $site_language;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_id', 'option_name', 'option_title', 'site_off','email','title','telephone',
            		'description','keywords','admin_language','site_language','site_off_description'], 'required'],
            [['option_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['option_name', 'option_title', 'option_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'option_id' => 'Option ID',
            'option_name' => 'Option Name',
            'option_title' => 'Option Title',
            'option_value' => 'Option Value',
        	'create_time' => Yii::t('dashboard','Create Time'),
        	'update_time' => Yii::t('dashboard','Update Time'),
        	'title' => Yii::t('dashboard','Title Site'),
        	'email' => Yii::t('dashboard','Email'),
        	'telephone' => Yii::t('dashboard','Telephone'),
        	'description' => Yii::t('dashboard','Description'),
        	'keywords' => Yii::t('dashboard','Keywords'),
        	'admin_language' => Yii::t('dashboard','Admin Language'),
        	'site_language' => Yii::t('dashboard','Site Language'),
        	'site_off' => Yii::t('dashboard','Site Off'),
        	'site_off_description' => Yii::t('dashboard','Site Off Description'),
        	'site_off_description' => Yii::t('dashboard','Site Off Description'),
        	'site_off_lable' => Yii::t('dashboard','Site Off Description'),
        ];
    }
}
