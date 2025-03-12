$(function(){
		var cantinput = $('input[name=cant_items').length;
		var suma = 0;
		var num_igv = parseInt($('#valor_igv').val());
		for (var i = 0; i < cantinput; i++) {
			var total2 = [parseFloat($('#precio_neto'+i+'').val())];
			suma += parseFloat(total2);
			$('#subtotal').val(suma);
			var subtotal = parseFloat($('#subtotal').val());
			var valor_igv = parseFloat(num_igv / 100);
			var IGV = parseFloat(valor_igv * subtotal).toFixed(2);
			$('#igv').val(IGV);
			var igv = parseFloat($('#igv').val());
			var total = parseFloat(subtotal+igv).toFixed(2);
			var totald = parseFloat(total/4.1).toFixed(2);
			var totale = parseFloat(total/3.9).toFixed(2);
			$('#total').val(total);
		}
});