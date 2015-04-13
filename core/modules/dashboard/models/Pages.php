<?php

namespace app\modules\dashboard\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $create_time
 * @property string $update_time
 */
class Pages extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => Yii::t('dashboard', 'Title'),
            'text' => Yii::t('dashboard', 'Text'),
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @inheritdoc
     */
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

}
