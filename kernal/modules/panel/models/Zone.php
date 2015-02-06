<?php

namespace app\modules\panel\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $name
 * @property integer $substate_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property Substate $substate
 */
class Zone extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return static::getDb()->tablePrefix . 'zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'substate_id'], 'required'],
            [['substate_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('panel','Zone Name'),
            'substate_id' => Yii::t('panel','Substate ID'),
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstate()
    {
        return $this->hasOne(Substate::className(), ['id' => 'substate_id']);
    }
   /* 
    * old code
    * remove
    public static function cityDropdown()
    {
    	// get data if needed
    	static $dropdown;
    	    	 
    	if ($dropdown === null) {
    		$city = Substate::find()->all();
    		foreach ($city as $row) {
    			$dropdown[$row['id']] = $row['name']; 
    		}
    	}
    
    	return $dropdown;
    }*/
    
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
}
