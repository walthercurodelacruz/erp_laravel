@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Fecha de Pago</div>
	<form action="{{route('FPagoCot.update', $cotfpago->id_fpago)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Dias para pagar</label>
					<input type="text" maxlength="50" name="nom_fpago" value="{{$cotfpago->nom_fpago}}" required="">
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('FPagoCot.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	