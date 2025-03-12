@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar expiración</div>
	<form action="{{route('ExpiraCot.update', $cotexpira->id_expira)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Dias para expirar</label>
					<input type="text" maxlength="50" name="nom_expira" value="{{$cotexpira->nom_expira}}" required="">
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('ExpiraCot.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	