@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar tiempo de entrega</div>
	<form action="{{route('TEntregaCot.update', $cottentrega->id_tentrega)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<input type="text" maxlength="50" name="nom_tentrega" value="{{$cottentrega->nom_tentrega}}" required="">
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('TEntregaCot.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	