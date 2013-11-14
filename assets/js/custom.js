$(document).ready(function(){

	
	
});

//get info of the books
function info(i){
	var book_id = $("#book_id"+i).val();
	$.ajax({
		url: 'info',
		type: 'post',
		dataType: 'json',
		data: {
			book_id: book_id
		},
		success: function(response){
			
			$("#book_title").html(response[0][0].book_name);
			$("#img").html('<img src="'+response[0][1].path+'" alt="'+response[0][1].alt+'">');
			$("#profile p").html('Category: ');
			for(var i=0; i<response[0][2].length;i++){
				var j = i+1;
				if(j==response[0][2].length){
					$("#profile p").append(' '+response[0][2][i]+'<hr />');
				}else{
					$("#profile p").append(response[0][2][i]+', ');
				}
			}
			$("#profile p").append('Author: <br />'+response[0][0].author+'<hr />');
			$("#profile p").append('Publisher: <br />'+response[0][0].publisher+'<hr />');
			$("#profile p").append('Published_date: <br />'+response[0][0].published_date+'<hr />');
			$("#profile p").append('Description: <br />'+response[0][0].description);
			var price_list = '';
			for(var i=0;i<response[1][0].length;i++){
				
				price_list = price_list + '<div class="row-fluid price-detail">'+
									'<div class="span3 product-seller"> '+response[1][1][i].name+'</div>'+
                					'<div class="span3 product-price"> '+response[1][0][i].price+'</div>'+
                					'<div class="span3 product-delivery"> '+response[1][0][i].delivery_cost_within_city+'</div>'+
                					'<div class="span3 product-delivery"> '+response[1][0][i].delivery_cost_outof_city+'</div>'+
                					'<div class="span3 product-delivery"> <select name="qty" id="qty">';
                                        									for(var count=1;count<=5;count++){
                                          										price_list = price_list + '<option value="'+count+'">'+count+'</option>';
                                        									}
                                                                        	price_list = price_list + '</select></div>'+
                					'<div class="span3 product-buy"><a id="buy" onClick="buy('+response[1][0][i].stock_id+');" href="javascript:void(0)">Buy</a></div>'+
                				'</div>';

			}
			$("#display").html(price_list);
		}
	});
}

function buy(stock_id){
	var stock_id = stock_id;
	var qty = $("#qty").val();
	var Cart = true;
	$.ajax({
		url: 'product',
		type: 'post',
		data: {
			Cart: Cart,
			stock_id: stock_id,
			qty: qty
		},
		success: function(response){
			
			$("#cart_count").html('<a href="view_cart">Cart ('+response+')</a>');
		}
	});
}