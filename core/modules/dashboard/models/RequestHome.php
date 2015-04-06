<?php

namespace app\modules\dashboard\models;

use Yii;
use  yii\db\ActiveRecord;
use app\modules\user\models\User;
use app\modules\user\models\Profile;
/**
 * This is the model class for table "{{%request_home}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer request_code
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $zone_id
 * @property integer $home_type
 * @property integer $doc_type
 * @property integer $contract_type
 * @property integer $Metr
 * @property integer $total_price
 * @property integer $price_rent
 * @property integer $rent
 * @property string $description
 * @property string $create_time
 * @property string $update_time
 */
class RequestHome extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%request_home}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	
            [['state_id', 'city_id', 'zone_id','contract_type'], 'integer'],
        	[['home_type', 'doc_type', 'metr', 'total_price', 'price_rent', 'rent'], 'string'],
            [['request_code','user_id','create_time', 'update_time'], 'safe'],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
        	'request_code' => Yii::t('dashboard','Request Code'),
            'state_id' => Yii::t('dashboard','State ID'),
            'city_id' => Yii::t('dashboard','City ID'),
            'zone_id' => Yii::t('dashboard','Zone ID'),
            'home_type' => Yii::t('dashboard','Home Type'),
            'doc_type' => Yii::t('dashboard','Doc Type'),
            'contract_type' => Yii::t('dashboard','Contract Type'),
            'metr' => Yii::t('dashboard','Metr'),
            'total_price' => Yii::t('dashboard','Total Price'),
            'price_rent' => Yii::t('dashboard','Price Rent'),
            'rent' => Yii::t('dashboard','Rent'),
            'description' => Yii::t('dashboard','Description'),
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
	 * 
	 * @param user id = $id
	 * Get user name 
	 */
    public static function getUser($id){
    	
    	$name = Profile::findOne(['user_id'=> (int)$id])->full_name; 
    	if($name){
    		
    		return $name;
    	} 
    	return User::findOne(['id'=> (int)$id])->username;
    	
    }
	/**
	 * 
	 * @param user $id
	 * get user tell
	 */
    public static function getTell($id){
    
    	return Profile::findOne(['user_id'=> (int)$id])->mobile;
    
    }

    
    public static function getState($id){
    	 
    	return State::findOne(['id'=> (int)$id])->name;
    	 
    }

    public static function getCity($id){
    
    	return City::findOne(['id'=> (int)$id])->name;
    
    }

    public static function getZone($id){
    
    	return Zone::findOne(['id'=> (int)$id])->name;
    
    }


    public static function getContractType($id){
    
    	return HomeDetails::findOne(['id'=> (int)$id])->title;
    
    }

    
    public static function getCreateTime($id){
    
    	 $date = explode(' ' ,self::findOne(['id'=> (int)$id])->create_time);
    	 return $date[0];
    }
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
    	$length = 4;
    	$string = "";
    	while ($length > 0) {
    		$string .= mt_rand(0,4);
    		$length -= 1;
    	}
    	$user_id = Yii::$app->user->identity->id;
    	$this->user_id = $user_id;
    	$this->request_code =  $user_id.$string;
    	return parent::beforeSave($insert);
    } 
}
