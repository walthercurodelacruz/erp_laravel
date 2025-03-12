@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar IGV</div>
	<form action="{{route('Igv.update', $igv->id_igv)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Valor de igv en %</label>
					<input type="text" maxlength="5" name="valor_igv" required="" value="{{$igv->valor_igv}}">
				</div>
			</div>	
		</div>
		<div class="return">
			<a href="{{route('Igv.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	