@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box"> 
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles del @if($producto->prod_serv == 1)Producto @else Servicio @endif</div>
	</section>
	<section class="details">
        <div>
            <p class="cod">CODIGO: <span>{{$producto->cod_prod}}</span></p>
            <p>Nombre/Item: <span>{{$producto->item_prod}}</span></p>
            <p>P/Number: <span>{{$producto->sn_prod}}</span></p>
            <p>Fabricante: <span>{{$producto->fabric_prod}}</span></p>
            <p>Modelo: <span>{{$producto->modelo_prod}}</span></p>
            <p>Categoria: <span>{{$producto->categ_prod}}</span></p>
            <p>Precio Costo: <span>{{$producto->pcosto_prod}}</span></p>
            <p>Precio Venta: <span>{{$producto->pventa_prod}}</span></p>
            <p>SKU:<span>{{$producto->dispo_prod}}</span></p>
            <p>Ruc Proveedor: <span>{{$producto->ruc_prov}}</span></p>
            <p>Razon social: <span>{{$producto->razons_prov}}</span></p>
            <p>Descripcion: 
            	<span class="content">{{$producto->desc_prod}}</span>
            </p>
            <p>P/S: <span>@if($producto->prod_serv == 1)Producto @else Servicio @endif</span></p>
            <p>Estado: <span>@if($producto->estado_prod == 1)Activo @else Inactivo @endif</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Producto.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection