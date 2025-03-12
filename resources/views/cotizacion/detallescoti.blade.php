<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cotización</title>
</head>
<style>
body {
  background-image: url('http://192.168.56.101/public/img/sidebar_cotizacion.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body>
<style>
        *{
            margin:3px;
        }
        .1{
            text-align:center;
            font-size: 11px;
        }
        .2{
            margin-top:10px;
            text-align:center;
            font-size: 11px;
        }
        .2 .respuesta{
            color: black;
        }
        .3 {
            text-align: center;
            font-size: 11px;

        }
        }
        .3 .respuesta{
            color: black;
        }
        .container{
            width:100%;
            height:auto;
        }
        .box{
            width:200px;
            height:100px;
            margin: 5px;
            box-sizing:border-box;
            float: left;
        }
        .box1{
            width:200px;
            height:100px;
            margin: 60px;
            box-sizing:border-box;
            float: left;
        }
        .box .respuesta{
            color: black;
        }
        .box .4 {
            text-align: center;
            font-size: 11px;
        }
        .box .4 .respuesta{
            color: black;
        }
        .box1 .4 {
            text-align: center;
            font-size: 11px;
        }
        .box1 .4 .respuesta{
            color: black;
        }
        .4 .respuesta{
            color: black;
        }
        .5{
            text-align: center;
            font-size: 11px;
            float: right;
        }
        .5 .respuesta{
            color: black;
        }
        .container2{
            width:100%;
            height:auto;
        }
		.container3{
            width:100%;
            height:auto;
        }
        .box2{
            width:200px;
            height:100px;
            margin: 5px;
            box-sizing:border-box;
            float: left;
        }
        .box3{
            width:200px;
            height:100px;
            margin: 120px;
            box-sizing:border-box;
            float: left;
        }
        .box2 .respuesta{
            color: black;
        }
        .box2 .7 {
            text-align: center;
            font-size: 11px;
        }
        .box2 .7 .respuesta{
            color: black;
        }
        .box3 .7 {
            text-align: center;
            font-size: 11px;
        }
        .box3 .7 .respuesta{
            color: black;
        }
    </style>
	<div class="container">
		<div class="box">
            <img src="" alt="" width="150px">
		</div>
		<div class="box">
		<table class="3" width="520px">
		<tr>
            <th align="center"><br><br>SENATI -ETI | COTIZACIÓN N° {{$cotizacion->cod_cot}}<br><br></th>
        </tr>
		</table>
		<table class="3" width="400px">
		<tr>
			<td align="left"><span>LIMA {{date("d/m/Y", strtotime($cotizacion->fecha_cot))}}<br><br></span></td>
		</tr>
		<tr>
			<td align="left"><b>SEÑORES:</b></td>
		</tr>
		<tr>
			<td align="left"><b>{{$cotizacion->cliente_cot}}</b></td>
		</tr>
		<tr>
			<td align="left"><span>{{$cotizacion->direc_cot}}<br><br></span></td>
		</tr>
		<tr>
			<td align="left"><b>Atte.</b> {{$cotizacion->contacto_cot}}</td>
		</tr>
		<tr>
			<td align="left"><b>Dpto.</b> {{$cotizacion->cargo_cot}}<br><br></td>
		</tr>
		<tr>
			<td align="left"><b>Reciba nuestro cordial saludo y agradecimiento a su invitación a cotizar,
			<br><span> Asi mismo presentamos nuestra propuesta económica de los productos o servicios solicitados:
			</span><br><br></b>
			</td>
		</tr>
		</table>
		<table class="3" cellspacing="0" border="1" width="520px">
		<thead>
			<tr>
				<th>ITEM</th>
				<th>N° PARTE</th>
				<th>DESCRIPCIÓN</th>
				<th>CANT.</th>
				<th>P.UNIT.</th>
				<th>P.TOTAL</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tablaitem as $tabla)
			@if ($cotizacion->cod_cot == $tabla->cod_cot)
			<tr>
				<td>{{$tabla->numitem}}</td>
				<td>{{$tabla->nota_items}}</td>
				<td>{{$tabla->detalle_items}}</td>
				<td>{{$tabla->cant_items}}</td>
				<td>{{$cotizacion->simbolo}} {{$tabla->precio_items}}</td>
				<td>{{$cotizacion->simbolo}} {{$tabla->total_items}}</td>
			</tr>
			@endif
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td rowspan="3" colspan="4"></td>
				<td>SUB TOTAL:</td>
				<td>{{$cotizacion->simbolo}} {{$subt2}}</td>
			</tr>
			<tr>
				<td>IGV:</td>
				<td>{{$cotizacion->simbolo}} {{round($IGV,2)}}</td>
			</tr>
			<tr>
				<td>TOTAL:</td>
				<td>{{$cotizacion->simbolo}} {{round($total,2)}}</td>
			</tr>
		</tfoot>
		</table>
		<br><br><br>
		<table class="3" width="520px">
		<tr>
            <th align="center">CONDICIONES DE VENTA O SERVICIO<br><br></th>
        </tr>
		</table>
		<table class="3" width="380px">
			<tr>
				<td align="left"><b>MONEDA: </b></td>
                <td align="left">{{$cotizacion->moneda_cot}}</td>
            </tr>
			<tr>
				<td align="left"><b>CONDICIÓN DE PAGO: </b></td>
                <td align="left">Fáctura pago {{$cotizacion->fpago_cot}}</td>
            </tr>
			<tr>
				<td align="left"><b>ENTREGA DE BIENES: </b></td>
                <td align="left">{{$cotizacion->tentrega_cot}} Previa OC. Almacenes de Lima</td>
            </tr>
			<tr>
				<td align="left"><b>VALIDEZ DE LA OFERTA: </b></td>
                <td align="left">{{$cotizacion->expira_cot}}</td>
            </tr>
			<tr>
				<td align="left"><b>IMPUESTOS: </b></td>
                <td align="left">{{$cotizacion->impuestos}}</td>
            </tr>
			<tr>
				<td align="left"><b>GARANTÍA: </b></td>
                <td align="left">{{$cotizacion->garantia}}</td>
            </tr>
			<tr>
				<td align="left"><b>CONDICIÓN DEL PRODUCTO: </b></td>
                <td align="left">{{$cotizacion->condproduc}}</td>
            </tr>
			
		</table>
		<table class="3" width="500px">
			<tr>
                <td align="left">Condiciones Generales SENATI
				<br>Escuela de Tecnologias de la Información
				</td>
            </tr>
		</table>
		</div>

	</div>
</body>
</html>