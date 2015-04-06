<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;

use app\modules\dashboard\models\Apartments;
use app\modules\user\models\User;
use app\modules\user\models\Profile;
/**
 * This is the model class for table "{{%apartments_Info}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $home_general_Info_id
 * @property string $Infrastructure
 * @property string $metr
 * @property string $rooms
 * @property string $floor
 * @property string $floors
 * @property string $unit
 * @property string $units
 * @property string $view
 * @property string $r_status
 * @property string $old_home
 * @property string $location
 * @property string $description
 * @property string $cabinets
 * @property string $wc
 * @property string $flooring
 * @property string $price_metr
 * @property string $price_all
 * @property string $parking
 * @property string $tell
 * @property string $loan
 * @property string $facilities
 * @property string $create_time
 * @property string $update_time
 */
class Apartments extends ActiveRecord
{
	public $age;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apartments_Info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['Infrastructure', 'rooms','floor', 'floors', 'units', 'price_metr', 'price_all'], 'required'],
            [['home_general_Info_id','user_id','age', 'unit', 'units','parking', 'tell', 'floor', 'floors','rooms'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['Infrastructure', 'metr','location','view', 'r_status', 'old_home',  'description', 'cabinets', 'wc', 'flooring', 'price_metr', 'price_all', 'loan', 'facilities'], 'string', 'max' => 255]
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
            'home_general_Info_id' => 'Home General  Info ID',
            'Infrastructure' => Yii::t('dashboard','Infrastructure'),
            'metr' => Yii::t('dashboard','Metr'),
            'rooms' => Yii::t('dashboard','Rooms'),
            'floor' => Yii::t('dashboard','Floor'),
            'floors' => Yii::t('dashboard','Floors'),
            'unit' => Yii::t('dashboard','Unit'),
            'units' => Yii::t('dashboard','Units'),
            'view' => Yii::t('dashboard','View'),
            'r_status' => Yii::t('dashboard','R Status'),
            'old_home' => Yii::t('dashboard','Old Home'),
            'location' => Yii::t('dashboard','Location'),
            'description' => Yii::t('dashboard','Description'),
            'cabinets' => Yii::t('dashboard','Cabinets'),
            'wc' => Yii::t('dashboard','Wc'),
            'flooring' => Yii::t('dashboard','Flooring'),
            'price_metr' => Yii::t('dashboard','Price Metr'),
            'price_all' => Yii::t('dashboard','Price All'),
            'parking' => Yii::t('dashboard','Parking'),
            'tell' => Yii::t('dashboard','Tell'),
            'loan' => Yii::t('dashboard','Loan'),
            'facilities' => Yii::t('dashboard','Facilities'),
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
 
    /**
     * @inheritdoc
     * save sale code and user id 
     */
    public function beforeSave($insert)
    {
    	$this->user_id = Yii::$app->user->identity->id;
    	return parent::beforeSave($insert);
    }  

    public static function getApartmentsCode($id){
    	
    	return HomeGeneralInfo::findOne(['id' => $id])->sale_code;
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
}
