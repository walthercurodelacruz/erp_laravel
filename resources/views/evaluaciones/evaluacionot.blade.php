@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
			<p><h5 align="right">Conectado | {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h5></p>
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Ordenes de trabajo</p>
                    </div>
                    <div class="createSegment">
                        <form method="GET">
                            <input type="text" name="ruc" placeholder="Buscar ruc" value="{{$ruc}}">
                            <button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">N°</td>
                                <td style="min-width:100px;">Ruc cliente</td>
                                <td style="min-width:100px;">Cliente</td>
                                <td style="min-width:100px;">Estado</td>
                                <td style="min-width:100px;">Creación</td>
                                <td style="width:170px;">Accion</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($evaluaciones)<=0)
                                <tr>
                                    <td colspan="6">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($evaluaciones as $evaluacion)
                                <tr>
                                    <td><a href="{{route('detallesot', $evaluacion->id_eval)}}">{{$evaluacion->cod_eval}}</a></td>
                                    <td>{{$evaluacion->rucc_eval}}</td>
                                    <td>{{$evaluacion->cliente_eval}}</td>
                                    <td>{{$evaluacion->estado_eval}}</td>
                                    <td>{{$evaluacion->update_eval}}</td>
                                    <td class="action">
                                        <span class="actionCust">
                                            @can('editar-evaluacion')
                                            <a href="{{route('Evaluaciones_editar', $evaluacion->id_eval)}}"><i class='bx bxs-edit-alt'></i></a>
                                            @endcan
                                        </span>
                                        <span class="actionCust add_flex">
                                            @can('borrar-evaluacion')
                                                <form action="{{route('Evaluaciones_eliminar', $evaluacion->id_eval)}}" method="post">
        											@csrf
        											@method('DELETE')
        											<button type="submit"><i class='bx bx-x' ></i></button>
        										</form>
                                            @endcan
                                    </span>
                                    </td>                       
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$evaluaciones->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection