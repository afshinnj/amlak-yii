<?php

namespace app\modules\panel\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%home_type}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class HomeType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%home_type}}';
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
            'id' => Yii::t('fa-IR','ID'),
            'title' => Yii::t('fa-IR','Title'),
            'create_time' => Yii::t('fa-IR','Create Time'),
            'update_time' => Yii::t('fa-IR','Update Time'),
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
}
