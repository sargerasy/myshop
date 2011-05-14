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
		$(".drop").click(function(e) {
			var t = $(this);
			var line = t.parents(".cart-line");
			dropFromCartRequest(line, t.attr("href"));
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
		var line = [
			createATag(cart.goods_url, cart.goods_name), 
			cart.count, 
			cart.price, 
			cart.price*cart.count, 
			createATag(cart.drop_url, cart.drop_label, "drop")
		];
		table.append(addLineToTable(line));
		table.find("tr:last-child").find(".drop").click(function(e) {
			var t = $(this);
			var line = t.parents(".cart-line");
			dropFromCartRequest(line, t.attr("href"));
			e.preventDefault();
			return false;
		});
	}

	function dropFromCartRequest(line, url) {
		$.ajax({
			'url': url,
			type: 'POST',
			success: function() {
				line.remove();
			}
		});
	}

	function createATag(url, label, clazz) {
		return '<a href="' + url + '" class="' + clazz + '">' + label + '</a>';
	}

	function addLineToTable(line) {
		var tr = '<tr class="cart-line">';
		$.each(line, function(i, v) {
			tr += "<td>" + v + "</td>";
		});
		tr += "</tr>";
		return tr;
	}

})(jQuery));
