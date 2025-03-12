@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar fabricante</div>
	<form action="{{route('Fabricante.update', $fabricante->id_fabricante)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="50" name="nom_fabricante" value="{{$fabricante->nom_fabricante}}" required="">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Fabricante.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	