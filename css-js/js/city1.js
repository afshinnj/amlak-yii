$(document).ready(function(){
	
	State();
	City();	
	Price();
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
			var formURL ='subcat';
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
				
	$('#contract').change(function(){
		Price();
	});	
	function Price(){
			var contract = $('#contract').val();
			if(contract == 103){
				$('#total_price').show();
				$('#price_rent').hide();
			}
			if(contract == 104){
				$('#total_price').hide();
				$('#price_rent').show();
			}
	}		
	
})
