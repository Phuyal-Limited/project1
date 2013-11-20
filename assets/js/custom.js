$(document).ready(function(){

	
	
});

//get info of the books
function info(y, x){
	var prev_show = $("#info-showed").val();
	
	if(prev_show==''){
		//nothing
	}else{
		if(prev_show==x){
			//do nothing
		}else{
			$("#info-show"+prev_show).hide(1000);
		}
	}
	var book_id = $("#book_id"+y).val();
	$.ajax({
		url: 'info',
		type: 'post',
		dataType: 'json',
		data: {
			book_id: book_id
		},
		success: function(response){
			//for css of arrow
			var a = Number(y%4);
			if(a==0){
				$("#arrow"+x).css({
					"margin-left":"10%"
				});
			}else if(a==1){
				$("#arrow"+x).css({
					"margin-left":"35%"
				});
			}else if(a==2){
				$("#arrow"+x).css({
					"margin-left":"65%"
				});
			}else if(a==3){
				$("#arrow"+x).css({
					"margin-left":"85%"
				});
			}else{
				//
			}
			$("#book_title"+x).html(response[0][0].book_name);
			$("#img"+x).html('<img src="'+response[0][1].path+'" alt="'+response[0][1].alt+'">');
			$("#info-tab"+x).html('Category: ');
			for(var i=0; i<response[0][2].length;i++){
				var j = i+1;
				if(j==response[0][2].length){
					$("#info-tab"+x).append(' '+response[0][2][i]+'<hr />');
				}else{
					$("#info-tab"+x).append(response[0][2][i]+', ');
				}
			}
			$("#info-tab"+x).append('Author: <br />'+response[0][0].author+'<hr />');
			$("#info-tab"+x).append('Publisher: <br />'+response[0][0].publisher+'<hr />');
			$("#info-tab"+x).append('Published_date: <br />'+response[0][0].published_date+'<hr />');
			$("#info-tab"+x).append('Description: <br />'+response[0][0].description);
			var price_list = '';
			
			for(var i=0;i<response[1][0].length;i++){
				var counter = 0;
				price_list = price_list + '<div class="row-fluid price-detail">'+
									'<div class="span2 product-seller"> '+response[1][1][i].name+'</div>'+
                					'<div class="span2 product-price"> '+response[1][0][i].price+'</div>'+
                					'<div class="span2 product-delivery"> '+response[1][0][i].delivery_cost_within_city+'</div>'+
                					'<div class="span2 product-delivery"> '+response[1][0][i].delivery_cost_outof_city+'</div>'+
                					'<div class="span4 product-delivery cart-buttons" id="added_msg'+i+'" style="display:none;"></div>';
                					for(var j=0;j<response[2].length;j++){
                						if(response[2][j]==response[1][0][i].stock_id){
                							counter++;
                							price_list = price_list + '<div class="span4 product-delivery cart-buttons"> This Book is in your <a style="padding:3px;" href="view_cart">Cart</a></div>';
                							
                						}
                					}
                					if(counter==0){
                						price_list = price_list + '<div id="show'+i+'" class="span2 product-delivery"> <select style="width:50px;" name="qty" id="qty">';
                                       									for(var count=1;count<=5;count++){
                                       										price_list = price_list + '<option value="'+count+'">'+count+'</option>';
                                       									}
                                                                       	price_list = price_list + '</select></div>'+
                					'<div id="show'+i+'" class="span2 product-buy cart-buttons"><a style="padding:3px;" id="buy" onClick="buy('+response[1][0][i].stock_id+', '+i+', '+x+');" href="javascript:void(0)">Add to Cart</a></div>';
                						}
                					
                					price_list = price_list + '</div>';
                					
			}
			$("#info-showed").val(x);
			$("#display"+x).html(price_list);
			$("#info-show"+x).show(1000);
		}
	});
}

function buy(stock_id, i, x){
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
			$("#display"+x+" #show"+i).hide();
			$("#display"+x+" #added_msg"+i).html(' This Book is added to your <a style="padding:3px;" href="view_cart">Cart</a>');
			$("#display"+x+" #added_msg"+i).show();
		}
	});
}

function close_info(x){
	$("#info-show"+x).hide(1000);
}