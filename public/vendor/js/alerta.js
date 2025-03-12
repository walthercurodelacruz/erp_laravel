$(document).submit(function(){
	var cant_stock = parseInt($('#unid-stock').val());
	var cant_salida = parseInt($('#cant-salida').val());

	if (cant_salida > cant_stock){
		window.alert("Cantidad en stock excedida");
	}

	if (cant_stock == 0){
		window.alert("La cantidad en stock es 0");
	}
	
});