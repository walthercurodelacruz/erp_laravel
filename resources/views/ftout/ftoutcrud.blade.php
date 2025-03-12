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
                    	<p>Facturas Emitidas</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-occ')
                            <a href="{{route('Ftout.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                        @endcan
                        <form method="GET">
                            <input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}">
                            <button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>   
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:100px;">RUC cliente</td>
                                <td style="min-width:100px;">Razon social</td>
                                <td style="min-width:100px;">N° de Factura</td>
                                <td style="min-width:100px;">Archivo</td>
                                <td style="min-width:100px;">COT</td>
                                <td style="min-width:100px;">N° OCC</td>
                                <td style="width:130px;">Accion</td>
                            </tr>
                        </thead>  
                        <tbody>
                            @if(count($ftouts)<=0)
                                <tr>
                                    <td colspan="7">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($ftouts as $ftout)
                            <tr>
                                <td><a href="{{route('Ftout.show', $ftout->id_ftout)}}">{{$ftout->cod_ftout}}</a></td>
                                <td>{{$ftout->ruc_ftout}}</td>					
                                <td>{{$ftout->razons_ftout}}</td>
								<td>{{$ftout->desc_ftout}}</td>
                                <td><form action="{{route('download')}}" method="post">
                                        @csrf
                                        <input hidden="" type="text" name="archivo" value="{{$ftout->arch_ftout}}">
                                        <button type="submit"><i class='bx bx-download'></i></button>
                                    </form>
								</td>
								<td>{{$ftout->cot_ftout}}</td>
								<td>{{$ftout->entrega_ftout}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        @can('editar-occ')
                                            <a href="{{route('Ftout.edit', $ftout->id_ftout)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-occ')
                                        <form action="{{route('Ftout.destroy', $ftout->id_ftout)}}" method="post">
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
                        {!!$ftouts->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection