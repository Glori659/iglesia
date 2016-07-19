$(document).ready(function () {
    var url = window.location;
	$('.navbar-ex1-collapse ul li a[href="'+url+'"]').parent().addClass('active');
});