@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Moneda</div>
	<form action="{{route('MonedaCot.update', $cotmoneda->id_moneda)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
	            <div class="input-box">	
					<label>Moneda</label>
					<input type="text" maxlength="50" name="nom_moneda" value="{{$cotmoneda->nom_moneda}}" required="">
				</div>
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('MonedaCot.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	