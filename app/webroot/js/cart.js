$(document).ready(function(){

	$('.numeric1').on('keypress', function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return (/\d/.test(String.fromCharCode(event.keyCode)));
	});

	$('.numeric').on('keyup change', function(event) {

		var quantity = $(this).val();

		if ((event.keyCode == 46 || event.keyCode == 8) && quantity > 0) {
		} else {
			if(/\d/.test(String.fromCharCode(event.keyCode)) === false) {
				return false;
			}
		}

		var id = $(this).attr("data-id");
		if(parseFloat(quantity) > parseFloat($("#ProductMaxQuantity"+id).val())){
			alert('Maximum Quanity for this item is exceeded.');
			quantity = $("#ProductMaxQuantity"+id).val();
			$("#ProductQuantity-"+id).val(quantity);
			//return false;
		}
		
		var code = $("#ProductPromocode").val();
		if(code!=''){
			validatePromoCode(id,quantity);
		}else{
			ajaxcart(id, quantity);
		}

	});

	
	$('.promocode').on('keyup change', function(event) {
		var id = $(this).attr("data-id");
		quantity = $("#ProductQuantity-"+id).val();
		validatePromoCode(id,quantity);
	});	
	
	function validatePromoCode(id,quantity){
		
		var code = $("#ProductPromocode").val();
		var error_msg = '';
		$.ajax({
			type: "POST",
			url: Shop.basePath + "PromocodeUsers/checkPromoValidity",
			data: {
				code: code
			},
			dataType: "json",
			success: function(data) {
				if(data.result==1){
					error_msg = 'Promo code already applied';
					$("#ProductPromocodeId").val('');
				}else if(data.result==3){
					error_msg = 'Invalid promo code';
					$("#ProductPromocodeId").val('');
				}else {
					error_msg = '<font color = "green">Promo code applied successfully<font/>';
					$("#ProductPromocodeId").val(data.promocode_id);
				}
				$("#promo_error").html(error_msg);
				$("#promo_error").show();
				ajaxcart(id, quantity,data.discount,data.promocode_id);				
				
			},
			error: function() {
				//window.location.replace(Shop.basePath + "shop/clear");
			}
		});			
		
	}
	

	$(".remove").each(function() {
		$(this).replaceWith('<a class="remove" id="' + $(this).attr('id') + '" href="' + Shop.basePath + 'shop/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Shop.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

	$(".remove").click(function() {
		ajaxcart($(this).attr("id"), 0);
		return false;
	});

	function ajaxcart(id, quantity,discount=0,promocode_id=0) {

		if(quantity === 0) {
			$('#row-' + id).fadeOut(1000, function(){ $('#row-' + id).remove(); });
		}

		$.ajax({
			type: "POST",
			url: Shop.basePath + "shop/itemupdate",
			data: {
				id: id,
				quantity: quantity,
				discount: discount,
				promocode_id: promocode_id
			},
			dataType: "json",
			success: function(data) {
				$.each(data.OrderItem, function(key, value) {
					if($('#subtotal-' + key).html() != value.subtotal) {
						$('#ProductQuantity-' + key).val(value.quantity);
						$('#subtotal-' + key).html(value.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
					}
				});
				$('#subtotal').html('RM ' + data.Order.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				$('#discount').html('RM ' + data.Order.discount).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);				
				$('#total').html('RM ' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				if(data.Order.total === 0) {
					window.location.replace(Shop.basePath + "shop/clear");
				}
			},
			error: function() {
				//window.location.replace(Shop.basePath + "shop/clear");
			}
		});
	}

});
