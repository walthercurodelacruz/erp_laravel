@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                        <p>Permisos</p>
                    </div>                         
                    <div class="createSegment">
                        @can('crear-permisos')
                        <a class="btn btn-warning" href="{{route('permisos.create')}}">Nuevo</a>
                        @endcan
                    </div>
                </div>
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">N°</td>
                                <td style="min-width:100px;">Nombre</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>                 
                        <tbody>
                            <input type="hidden" value="{{$i = 0}}">
                            @foreach($permisos as $permiso)
                            <input type="hidden" value="{{$i++}}">
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$permiso->name}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        <a href="{{route('permisos.edit', $permiso->id)}}"><i class='bx bxs-edit-alt'></i></a>
                                    </span>
                                    <span class="actionCust add_flex">
                                        <form action="{{route('permisos.destroy', $permiso->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class='bx bx-x' ></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$permisos->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection