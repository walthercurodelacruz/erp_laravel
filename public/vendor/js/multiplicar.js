$(document).submit(function(){
	var num1 = parseInt($('#cant').val());
	var num2 = parseFloat($('#prec').val());
	if (isNaN(num1)) {
		num1 = 0;
	}
	if (isNaN(num2)) {
		num2 = 0;
	}
	$('#precio_neto').val(num1*num2).toFixed(2);
});