//Tootip activator
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

//xs hidden categories
$("#show-xs-nav").click(function () {
	$("#nav-categories").toggle("slow", function () {
		if ($(this).is(":visible") == true) {
			$("#show-xs-nav .hidde-sp").show();
			$("#show-xs-nav .show-sp").hide();
		} else {
			$("#show-xs-nav .hidde-sp").hide();
			$("#show-xs-nav .show-sp").show();
		}
	});
});
