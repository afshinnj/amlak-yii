<?php

namespace app\modules\panel\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%total_price}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class TotalPrice extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%total_price}}';
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
            'id' => Yii::t('panel','ID'),
            'title' => Yii::t('panel','Title'),
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
}
