$(document).ready(function(){

	$('.addtocart').on('click', function(event) {

		$.ajax({
			type: "POST",
			url: Shop.basePath + "shop/itemupdate",
			data: {
				id: $(this).attr("id"),
				quantity: 1,
			},
			dataType: "json",
			success: function(data) {

				//$('#msg').html('<div class="alert alert-success" id="flash_msg">Product Added to Shopping Cart</div>');
				window.location.href = Shop.basePath + 'shop/cart';
				//$('#flash_msg').delay(2000).fadeOut('slow');

			},
			error: function() {
				alert('Something went wrong !. Please try later.');
			}
		});

		return false;

	});

});
