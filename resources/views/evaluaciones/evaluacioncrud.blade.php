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
                    	<p>Evaluaciones</p>
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
                                <td style="min-width:100px;">Codigo cotización</td>
                                <td style="min-width:100px;">Ruc liente</td>
                                <td style="min-width:100px;">Cliente</td>
                                <td style="min-width:100px;">Estado</td>
                                <td style="min-width:100px;">Creación</td>
                                <td style="width:170px;">Accion</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($cotizaciones)<=0)
                                <tr>
                                    <td colspan="7">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	<input type="hidden" value="{{$i = 0}}">
                        	@foreach ($cotizaciones as $cotizacion)
                            	@if ($cotizacion->estado_cot == "Aprobado")
                            	<input type="hidden" value="{{$i++}}">
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$cotizacion->cod_cot}}</td>
                                        <td>{{$cotizacion->rucc_cot}}</td>
                                        <td>{{$cotizacion->cliente_cot}}</td>
                                        <td>{{$cotizacion->estado_cot}}</td>
                                        <td>{{$cotizacion->fecha_cot}}</td>
                                        <td class="action">
                                            <span class="actionCust">
                                                @can('crear-evaluacion')
                                                <a href="{{route('Evaluaciones_crear', $cotizacion->id_cot)}}"><i class='bx bxs-edit-alt'></i></a>
                                                @endcan
                                                <a href="{{route('detalleseva', $cotizacion->id_cot)}}">ver</a>
                                            </span>
                                        </td>                       
                                    </tr>
                                @endif
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$cotizaciones->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection