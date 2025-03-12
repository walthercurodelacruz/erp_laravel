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
                    	<p>Cotizaciones</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-cotizacion')
                            <a href="{{route('Cotizacion.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                        @endcan
                    </div>
                </div>
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:100px;">Ruc cliente</td>
                                <td style="min-width:100px;">Cliente</td>
                                <!-- <td style="min-width:100px;">Expira</td> -->
                                <td style="min-width:100px;">Estado</td>
                                <td style="min-width:100px;">Creación</td>
                                <td style="width:170px;">Accion</td>
                            </tr>
                        </thead> 
						<tbody>
                            <tr class="tr-buscar"><form method="GET">
                                <td><input type="text" name="cod" placeholder="Buscar" value="{{$cod}}"></td>
                                <td><input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}"></td>
                                <td><input type="text" name="clie" placeholder="Buscar" value="{{$clie}}"></td>
                                <!-- <td><input type="text" name="expira" placeholder="Buscar" value="{{$expira}}"></td> -->
                                <td><input type="text" name="est" placeholder="Buscar" value="{{$est}}"></td>
                                <td><input type="text" name="create" placeholder="Buscar" value="{{$create}}"></td>
                                <td><button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button></td>
                                </form>
                            </tr>
                            @if(count($cotizaciones)<=0)
                                <tr>
                                    <td colspan="9">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
							@foreach($cotizaciones as $cotizacion)
							<tr>
								<td><a href="{{route('Cotizacion.show', $cotizacion->id_cot)}}" target="_blank">{{$cotizacion->cod_cot}}</a></td>
								<td>{{$cotizacion->rucc_cot}}</td>
								<td>{{$cotizacion->cliente_cot}}</td>
								<!-- <td>{{$cotizacion->expira_cot}}</td> -->
								<td>{{$cotizacion->estado_cot}}</td>
								<td>{{$cotizacion->fecha_cot}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        @can('ver-cotizacion')
                                        <a href="{{route('pdf', $cotizacion->id_cot)}}"><i class='bx bx-download'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust">
                                        @can('editar-cotizacion')
                                        <a href="{{route('Cotizacion.edit', $cotizacion->id_cot)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-cotizacion')
                                        <form action="{{route('Cotizacion.destroy', $cotizacion->id_cot)}}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit"><i class='bx bx-x' ></i></button>
										</form>
                                        @endcan
                                    </span>
                                    <span class="actionCust">
                                        @can('crear-itemscot')
                                        <a href="{{route('registro_item', $cotizacion->id_cot)}}"><i class='bx bxs-archive-in'></i></a>
                                        @endcan
                                    </span>
                                </td>								
                            </tr>
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