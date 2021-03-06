/*
 * There are functions who needs to load in every template.
 * Shopping cart managing is here and etc.
 */

// Shopping Cart Manager
$("a.add-to-cart").click(function () {
	var reload = false;
	var article_id = $(this).data("id");
	var goto_site = $(this).data("goto");
	if ($(this).hasClass("refresh-me")) {
		reload = true;
	} else if (goto_site != null) {
		reload = goto_site;
	}
	manageShoppingCart("add", article_id, reload);
});
//DatePicker
if (typeof datepicker !== "undefined") {
	$(".input-group.date").datepicker({
		format: "dd/mm/yy",
	});
}

//Filters Technique
$(".go-category").click(function () {
	var category = $(this).data("categorie-id");
	$('[name="category"]').val(category);
	submitForm();
});
$(".in-stock").click(function () {
	var in_stock = $(this).data("in-stock");
	$('[name="in_stock"]').val(in_stock);
	submitForm();
});
$(".order").change(function () {
	var order_type = $(this).val();
	var order_to = $(this).data("order-to");
	$('[name="' + order_to + '"]').val(order_type);
	submitForm();
});
$(".brand").click(function () {
	var brand_id = $(this).data("brand-id");
	$('[name="brand_id"]').val(brand_id);
	submitForm();
});
$("#search_in_title").keyup(function () {
	$('[name="search_in_title"]').val($(this).val());
});
$("#clear-form").click(function () {
	$('#search_in_title, [name="search_in_title"]').val("");
	$("#bigger-search .form-control").each(function () {
		$(this).val("");
	});
	submitForm();
});
$(".clear-filter").click(function () {
	//clear filter in right col
	var type_clear = $(this).data("type-clear");
	$('[name="' + type_clear + '"]').val("");
	submitForm();
});
/*
 * Submit search form in home page
 */
function submitForm() {
	document.getElementById("bigger-search").submit();
}

function removeProduct(id, reload) {
	manageShoppingCart("remove", id, reload);
}
function manageShoppingCart(action, id_paket, reload) {
	var action_error_msg = "gagal";
	if (action == "add") {
		$('.add-to-cart a[data-id="' + id_paket + '"] span').hide();
		$('.add-to-cart a[data-id="' + id_paket + '"] img').show();
		var action_success_msg = "success";
	}
	if (action == "remove") {
		var action_success_msg = remove_from_cart;
	}
	$.ajax({
		type: "POST",
		url: variable.manageShoppingCartUrl,
		data: { id_paket: id_paket, action: action },
	})
		.done(function (data) {
			$(".dropdown-cart").empty();
			$(".dropdown-cart").append(data);
			var sum_items = parseInt($(".sumOfItems").text());
			if (action == "add") {
				$(".sumOfItems").text(sum_items + 1);
			}
			if (action == "remove") {
				$(".sumOfItems").text(sum_items - 1);
			}
			if (reload == true) {
				location.reload(false);
				return;
			} else if (typeof reload == "string") {
				location.href = reload;
				return;
			}
			ShowNotificator("alert-info", action_success_msg);
		})
		.fail(function (err) {
			ShowNotificator("alert-danger", action_error_msg);
		})
		.always(function () {
			if (action == "add") {
				$('.add-to-cart a[data-id="' + id_paket + '"] span').show();
				$('.add-to-cart a[data-id="' + id_paket + '"] img').hide();
			}
		});
}

function clearCart() {
	$.ajax({ type: "POST", url: variable.clearShoppingCartUrl });
	$("ul.dropdown-cart").empty();
	$("ul.dropdown-cart").append(
		'<li class="text-center">' + no_products + "</li>"
	);
	$(".sumOfItems").text(0);
	ShowNotificator("alert-info", cleared_cart);
}
// Top Notificator
function ShowNotificator(add_class, the_text) {
	$("div#notificator")
		.text(the_text)
		.addClass(add_class)
		.slideDown("slow")
		.delay(3000)
		.slideUp("slow", function () {
			$(this).removeClass(add_class).empty();
		});
}
