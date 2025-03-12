<style rel="stylesheet" type="text/css" media="all">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
	margin: 0;
	padding: 0;
	font-family: 'Poppins', sans-serif;
}
.container{
	width: 100%;
}
.container .titulo{
	width: 100%;
	font-size: 35px;
	font-weight: 600;
	text-align: center;
}
.container table{
	width: 100%;
}
.container table.items{
	margin-top: 15px;
	text-align: center;
}
.container table.main{
	font-weight: bolder;
}
.container table.main span{
	font-weight: normal;
}
.container table.main tr{
	width: 100%;
}
.container table.main tr td{
	width: 50%;
}
.items thead{
	border-bottom: 3px solid #000;
}
.items thead th{
	letter-spacing: 2px;
	padding: 2px;
	font-size: 19px;
}
.items tbody td{
	border-top: 1px solid black;
	padding: 4px;
	font-size: 18px;
}
.items tfoot{
    border-top: 2px solid black;
    border-bottom: ;
}
.container footer{
	position: absolute;
	width: 100%;
	text-align: center;
	bottom: 0;
}
input{
	border: none;
	outline: none;
}

</style>
<div class="container">
	<div class="titulo">
		<p>Orden de Compra</p>
	</div>
	<table class="main">
        <tr>
        	<td>Cod. OCP: <span>{{$ocp->cod_ocp}}</span></td>
        	<td>COT Proveedor: <span>{{$ocp->cod_cot}}</span></td>
        </tr>
        <tr>
        	<td>Responsable: <span>{{$ocp->respon_ocp}}</span></td>
        	<td>RUC Proveedor:<span>{{$ocp->ruc_prov}}</span></td>
        </tr>
        <tr>
        	<td>Estado: {{$ocp->estado_ocp}}</td>
        	<td>Razón Social: <span>{{$ocp->razons_ocp}}</span></td>
        </tr>
        <tr>
        	<td>Tiempo de entrega: <span>{{$ocp->entrega_ocp}}</span></td>
        	<td>Dirección: <span>{{$ocp->direc_ocp}}</span></td>
        </tr>
        <tr>
        	<td>Moneda: <span>{{$ocp->mon_ocp}}</span></td>
        	<td>Contacto: <span>{{$ocp->contacto_ocp}}</span></td>
        </tr>
        <tr>
			<td>Fecha: <span>{{$ocp->fecha_ocp}}</span></td>
        </tr>
	</table>

	<table class="items">
        <thead>
            <tr>
				<th>Cod. OP</th>
				<th>Item</th>
				<th>Nota</th>
				<th>Cantidad</th>
				<th>Costo</th>
				<th>Total</th>
            </tr>
        </thead>
        <tbody>
			@foreach($items as $item)
				@if($item->cod_ocp == $ocp->cod_ocp)
				<tr>
					<td>{{$item->cod_op}}</td>
					<td>{{$item->item_ocp}}</td>
					<td>{{$item->nota_ocp}}</td>
					<td>{{$item->cant_ocp}}</td>
					<td>{{$item->costo_ocp}}</td>
					<td>S/.{{$item->total_ocp}}</td>
				</tr>
				@endif
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4"></td>
				<td>Sub Total:</td>
				<td>S/{{$subt2}}</td>
			</tr>
			<tr>
				<td colspan="4"></td>
				<td>IGV:</td>
				<td>S/{{$IGV}}</td>
			</tr>
			<tr>
				<td colspan="4"></td>
				<td>Total:</td>
				<td>S/{{$total}}</td>
			</tr>
		</tfoot>
	</table>
</div>