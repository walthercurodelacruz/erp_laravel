@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar item</div>
	<form action="{{route('Compras.update', $compra->id_compras)}}" method="post">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>OP</label>
					<input type="text" readonly="" value="{{$compra->cod_op}}">					
				</div>
				<div class="box-input">
	            	<label>Nota</label>
					<input type="text" readonly="" value="{{$compra->nota_compras}}">
				</div>
				<div class="box-input">
					<label>Proveedor</label>
					<input type="text" name="prov_compras" required="" value="{{$compra->prov_compras}}">
				</div>
				<div class="box-input">
					<label>Costo</label>		
					<input type="text" name="costo_compras" required="" value="{{$compra->costo_compras}}">
				</div>
				<div class="box-input">
					<label>Vendedor</label>	
					<input type="text" readonly="" value="{{$compra->asig_compras}}">
				</div>
				<div class="box-input">
					<label>Responsable</label>		
					<input type="text" readonly="" value="{{$compra->respon_compras}}">
				</div>									
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Item</label>
					<input type="text" readonly="" value="{{$compra->item_compras}}">
				</div>
				<div class="box-input">
					<label>Cantidad</label>
					<input type="text" readonly="" value="{{$compra->cant_compras}}">
				</div>
				<div class="box-input">
					<label>Moneda</label>		
					<input type="text" name="mon_compras" required="" value="{{$compra->mon_compras}}">
				</div>
				<div class="box-input">
					<label>Cot Proveedor</label>	
					<input type="text" name="cot_prov_compras" required="" value="{{$compra->cot_prov_compras}}">
				</div>
				<div class="box-input">
					<label>Tiempo entrega</label>
					<input type="text" value="{{$compra->entrega_compras}}" readonly="">
				</div>
				<div class="box-input">
					<label>OCP</label>
					<input type="text" value="{{$compra->ocp_compras}}" readonly="">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Compras.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection