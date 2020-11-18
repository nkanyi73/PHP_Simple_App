$(document).ready(function(){
	$('#btn').click(function(event){
		event.preventDefault();

		var food_name = $('#foodName').val();
		var units = $('#amount').val();

		alert("This feature is coming soon");
		return;

		$.ajax({
			url: "api.foodapi.com/order",
			type: "post",
			header: {"api-key": "DAHHSAhsdfhahfai99"},
			data:{
				"food_name": food_name,
				"units": units
			},
			success: function(data){
				//process data
			},
			error:function(error){
				alert("An error occurred");
			}
		});
	});
});