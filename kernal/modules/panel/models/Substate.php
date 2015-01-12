<?php

namespace app\modules\panel\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "substate".
 *
 * @property integer $id
 * @property string $name
 * @property integer $state_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property Area[] $areas
 * @property State $state
 */
class Substate extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return static::getDb()->tablePrefix . 'substate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state_id'], 'required'],
        	[['name'], 'unique'],
            [['state_id'], 'integer'],
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
            'name' => Yii::t('panel','City Name'),
            'state_id' => Yii::t('panel','State ID'),
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['substate_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
    
    
    public static function stateDropdown()
    {
    	// get data if needed
    	static $dropdown;
    	//$state = new State();
    	
    	if ($dropdown === null) {
			$state = State::find()->all();
    		foreach ($state as $row) {
    			$dropdown[$row['id']] = $row['name'];

    		}
    	}
    
    	return $dropdown;
    }
    /**
     * @inheritdoc
     */
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
