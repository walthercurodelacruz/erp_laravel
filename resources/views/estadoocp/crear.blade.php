@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar estado</div>
	<form action="{{route('EstadoOcp.store')}}" method="post">
	@csrf
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="50" name="nom_ocp" required="">
				</div>
			</div>
		</div>	
		<div class="return">
			<a href="{{route('EstadoOcp.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	