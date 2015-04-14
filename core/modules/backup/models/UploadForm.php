<?php

namespace app\modules\backup\models;
use Yii;
use yii\base\Model;

class UploadForm extends Model
{
	public $upload_file ;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{

		return [
				['upload_file', 'required'],
				[['upload_file'], 'file','extensions' => 'sql', 'mimeTypes' => 'application/sql','maxSize' => 1024*1024*1024],
				
		];

	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
				'upload_file'=>Yii::t('dashboard','Upload File'),
		);
	}

}
