<?php

namespace app\modules\user\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tbl_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string  $create_time
 * @property string  $update_time
 * @property string  $full_name
 *
 * @property User    $user
 */
class Profile extends ActiveRecord
{
	public $file;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return static::getDb()->tablePrefix . "profile";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //            [['user_id'], 'required'],
            //            [['user_id'], 'integer'],
            //            [['create_time', 'update_time'], 'safe'],
            [['full_name'], 'string', 'max' => 100],
        	[['full_name'], 'match', 'pattern' => '/^[ ,A-Za-z0-9_,ضصثقفغعهخحجچشسیبلاتنمکگظطزرذدپوآ]+$/u', 
        					'message' => Yii::t("user","{attribute} can contain only letters, numbers, and '_'.", ["attribute" => '{attribute}'])],
        	['mobile', 'match', 'pattern' => '/^[۱۲۳۴۵۶۷۸۹۰0-9]+$/u', 'message' => "{attribute} can contain only numbers."],
        	[['mobile'],'string', 'min' => 9],
        	[['file'], 'file','extensions' => 'gif, jpg', 'mimeTypes' => 'image/jpeg, image/png','maxSize' => 1024*1024*1024,'on' => ['avatar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('user', 'ID'),
            'user_id'     => Yii::t('user', 'User ID'),
            'create_time' => Yii::t('user', 'Create Time'),
            'update_time' => Yii::t('user', 'Update Time'),
            'full_name'   => Yii::t('user', 'Full Name'),
        	'mobile' => Yii::t('user', 'Mobile'),
        ];
    }

    /**
     * @inheritdoc
     */
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        $user = Yii::$app->getModule("user")->model("User");
        return $this->hasOne($user::className(), ['id' => 'user_id']);
    }

    /**
     * Set user id
     *
     * @param int $userId
     * @return static
     */
    public function setUser($userId)
    {
        $this->user_id = $userId;
        return $this;
    }
}