@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar lote</div>
	<form action="{{route('Lote.update', $lote->id_lote)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="50" required="" name="nom_lote" value="{{$lote->nom_lote}}">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Lote.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	