<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%bargain_type}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class BargainType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%home_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('dashboard','ID'),
            'title' => Yii::t('dashboard','Title'),
            'create_time' => Yii::t('app','Create Time'),
            'update_time' => Yii::t('app','Update Time'),
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
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
    
    	$this->details_id = 2;
    	$this->details = 'Bargain Type';
    	return parent::beforeSave($insert);
    }
}