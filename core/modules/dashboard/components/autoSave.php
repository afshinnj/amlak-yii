<?php

namespace app\modules\dashboard\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class autoSave extends Component
{
	 public function html()
	 {
	  	echo "<div class='alert alert-info' role='alert' id='autoSave' style='display: none;'>
	 			<span class='glyphicon glyphicon-save'></span>&nbsp;&nbsp;  ".Yii::t('fa-IR','Auto Save')
			 ."<button type='button' class='close pull-left' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 }
	 
	 public function js()
	 {
	 	$js = <<<JS
	setInterval(function(){
		var formURL = $('form').attr("action");
		var postData = $('form').serializeArray();
		$.ajax({ 
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data) 
					{
						$('#autoSave').slideDown(1000).delay(5000).slideUp(1000);
					},
 });
	}, 120000);
JS;
	 	return  $js;
	 	
	 	
	 }
	 
}