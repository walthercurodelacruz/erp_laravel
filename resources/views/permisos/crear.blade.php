@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
    <div class="box-sub">
        <div class="title">Crear permisos</div>
        <form action="{{route('permisos.store')}}" method="post">
            @csrf
            <div class="details">
                <div class="details-box">
                    <div class="box-input">
                        <label for="name">nombre</label>
                        <input type="hidden" value="{{$a[0] = 'ver-'}}">
                        <input type="hidden" value="{{$a[1] = 'crear-'}}">
                        <input type="hidden" value="{{$a[2] = 'editar-'}}">
                        <input type="hidden" value="{{$a[3] = 'borrar-'}}">
                        @for($i=0; $i < 4; $i++)
                        <input type="text" name="name[{{$i}}]" class="form-control" value="{{$a[$i]}}">
                        <br>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="return">
                <a href="{{route('permisos.index')}}">Regresar</a>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection