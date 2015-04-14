<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%home_general_Info}}".
 *
 * @property integer $id
 * @property integer $sale_code
 * @property integer $user_id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $zone_id
 * @property integer $contract_type
 * @property string $home_type
 * @property string $doc_type
 * @property string $owner_name
 * @property string $owner_email
 * @property string $address_home
 * @property string $no_home
 * @property string $mobile
 * @property string $tell
 * @property string $create_time
 * @property string $update_time
 */
class HomeGeneralInfo extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%home_general_Info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            //[['contract_type', 'doc_type','owner_name', 'owner_email','address_home', 'no_home', 'tell'], 'required'],
            [['sale_code', 'user_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['mobile', 'tell1', 'state_id', 'city_id', 'zone_id', 'contract_type', 'home_type', 'doc_type', 'owner_name', 'owner_email', 'address_home', 'no_home', 'tell'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sale_code' => 'Sale Code',
            'user_id' => 'User ID',
            'state_id' => Yii::t('dashboard', 'State ID'),
            'city_id' => Yii::t('dashboard', 'City ID'),
            'zone_id' => Yii::t('dashboard', 'Zone ID'),
            'contract_type' => Yii::t('dashboard', 'Contract Type'),
            'home_type' => Yii::t('dashboard', 'Home Type'),
            'doc_type' => Yii::t('dashboard', 'Doc Type'),
            'owner_name' => Yii::t('dashboard', 'Owner Name'),
            'owner_email' => Yii::t('dashboard', 'Owner Email'),
            'address_home' => Yii::t('dashboard', 'Address Home'),
            'no_home' => Yii::t('dashboard', 'No Home'),
            'mobile' => Yii::t('dashboard', 'Mobile'),
            'tell' => Yii::t('dashboard', 'Call Tell'),
            'tell1' => Yii::t('dashboard', 'Call Tell1'),
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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

    /**
     * @inheritdoc
     * save sale code and user id 
     */
    public function beforeSave($insert) {
        $length = 4;
        $string = "";
        while ($length > 0) {
            $string .= mt_rand(0, 4);
            $length -= 1;
        }
        $user_id = Yii::$app->user->identity->id;
        $this->user_id = $user_id;
        $this->sale_code = $user_id . $string;
        return parent::beforeSave($insert);
    }

}
