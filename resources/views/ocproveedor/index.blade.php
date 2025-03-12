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
                    	<p>OC Proveedor</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-ocp')
                         <a href="{{route('OcProveedor.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                         @endcan
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:150px;">Ruc proveedor</td>
                                <td style="min-width:150px;">Proveedor</td>
                                <td style="min-width:150px;">Cotización prov.</td>
                                <!-- <td style="min-width:150px;">Entrega</td> -->
                                <!-- <td style="min-width:150px;">Estado</td> -->
                                <td style="min-width:150px;">Responsable</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-buscar"><form method="GET">
                                <td><input type="text" name="cod" placeholder="Buscar" value="{{$cod}}"></td>
                                <td><input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}"></td>
                                <td><input type="text" name="prov" placeholder="Buscar" value="{{$prov}}"></td>
                                <td><input type="text" name="cot" placeholder="Buscar" value="{{$cot}}"></td>
                                <!-- <td><input type="text" name="ent" placeholder="Buscar" value="{{$ent}}"></td> -->
                                <!-- <td><input type="text" name="est" placeholder="Buscar" value="{{$est}}"></td> -->
                                <td><input type="text" name="respon" placeholder="Buscar" value="{{$respon}}"></td>
                                <td><button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button></td>
                                </form>
                            </tr>
                            @if(count($ocps)<=0)
                                <tr>
                                    <td colspan="6">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($ocps as $ocp)
                            <tr>
								<td><a href="{{route('OcProveedor.show', $ocp->id_ocp)}}" target="_blank">{{$ocp->cod_ocp}}</a></td>
                                <td>{{$ocp->ruc_prov}}</td>
								<td>{{$ocp->razons_ocp}}</td>
                                <td>{{$ocp->cod_cot}}</td>
								<!-- <td>{{$ocp->entrega_ocp}}</td> -->
								<!-- <td>{{$ocp->estado_ocp}}</td> -->
								<td>{{$ocp->respon_ocp}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        <a href="{{route('pdf_ocp', $ocp->id_ocp)}}"><i class='bx bx-download'></i></a>
                                    </span>
                                    <span class="actionCust">
                                        @can('editar-ocp')
                                        <a href="{{route('OcProveedor.edit', $ocp->id_ocp)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-ocp')
                                        <form action="{{route('OcProveedor.destroy', $ocp->id_ocp)}}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit"><i class='bx bx-x' ></i></button>
										</form>
                                        @endcan
                                    </span>
                                    <span class="actionCust">
                                        @can('crear-itemsocp')
                                        <a href="{{route('registro_item_ocp', $ocp->id_ocp)}}"><i class='bx bxs-archive-in'></i></a>
                                        @endcan
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$ocps->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection