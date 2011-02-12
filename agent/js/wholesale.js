((function ($) {
	$(document).ready(function() {
		$("input[name=goods_count]").keypress(function(e){
			if(e.which == 13) {
				var line = $(this).parents(".ws-line");
				addToCartRequest(line);
				e.preventDefault();
				return false;
			}
		});
		$("input[name=add2cart]").click(function(e) {
			var line = $(this).parents(".ws-line");
			addToCartRequest(line);
			e.preventDefault();
			return false;
		});
	});

	function addToCartRequest(line) {
		$.ajax({
			url: "index.php?r=custom/add2cart",
			type: 'POST',
			data: {
				'goods_id': line.find('input[name=goods_id]').val(),
				'count': line.find('input[name=goods_count]').val(),
				'ws_id': line.find('input[name=ws_id]').val()
			},
			success: function(data) {
				addToCart(eval("("+data+")"));
			}
		});
	}

	function addToCart(cart) {
		var table = $("#ws-cart");
		table.append("<tr><td>" + cart.goods_name + "</td><td>" + 
				cart.count + "</td><td>" +
				cart.price + "</td><td>" +
				cart.price * cart.count + "</td><td>" +
				"drop</td>" + "</tr>");
	}

	function delFromCart() {
	}
})(jQuery));
