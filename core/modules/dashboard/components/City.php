<?php

namespace app\modules\dashboard\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class panel extends Component
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
			State();
			City();	
			
			$('#state').change(function(){
				State();
			});
			$('#city').change(function(){
				City();
			});		
			function State(){
					$('#city').prop('disabled', true);
					$('#area').prop('disabled', true);	
					$("#city").html("<option>Please wait</option>");
					$("#area").html("<option>Please wait</option>");
					var id = $('#state').val();
					var formURL = 'subcat';
					var postData = {'id' : id};
					$.ajax({
						url: formURL,
						type: 'post',
						data: postData,
						success:function(data)
								{
								if(data){
									$('#city').prop('disabled', false);
									$('#area').prop('disabled', false);
									$("#city").html(data);
								}else{
									$("#city").html(data);
								}
			
								City();
						    	}
					 });
			};
			function City(){
						
					var id = $('#city').val();
					var formURL = 'subcity';
					var postData = {'id' : id};
					$.ajax({
						url: formURL,
						type: 'post',
						data: postData,
						success:function(data)
								{
									if(data){
										$("#area").html(data);
									}else{
										$("#area").html('')
										}
									
						    	}
					 });
			};		


JS;
	 	return  $js;
	 	
	 	
	 }
	 
}