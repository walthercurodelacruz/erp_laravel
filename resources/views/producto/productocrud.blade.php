@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
				<p><h5 align="right">Conectado | {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h5></p>	
                <div class="d-flex">
					<div class="add_flex">
                    <p>Productos/Servicios</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-ps')
                            <a href="{{route('Producto.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                        @endcan
                    </div>
                </div>
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:100px;">Nombre</td>
                                <td style="min-width:100px;">P/Number</td>
                                <td style="min-width:100px;">SKU</td>
                                <!-- <td style="min-width:100px;">Proveedor</td> -->
                                <!-- <td style="min-width:100px;">RUC</td> -->
                                <!-- <td style="min-width:100px;">Tipo de item</td> -->
                                <td style="width:130px;">Accion</td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-buscar"><form method="GET">
                                <td><input type="text" name="cod" placeholder="Buscar" value="{{$cod}}"></td>
                                <td><input type="text" name="item" placeholder="Buscar" value="{{$item}}"></td>
                                <td><input type="text" name="sn_prod" placeholder="Buscar" value="{{$sn_prod}}"></td>
                                <td><input type="text" name="dispo_prod" placeholder="Buscar" value="{{$dispo_prod}}"></td>
                                <!-- <td><input type="text" name="razons_prov" placeholder="Buscar" value="{{$razons_prov}}"></td> -->
                                <!-- <td><input type="text" name="prov" placeholder="Buscar" value="{{$prov}}"></td> -->
                                <!-- <td><input type="text" name="tipo" placeholder="Buscar 1/0" value="{{$tipo}}"></td> -->
                                <td><button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button></td>
                                </form>
                            </tr>
                            @if(count($productos)<=0)
                                <tr>
                                    <td colspan="9">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                            
							@foreach($productos as $prod)
                            
							<tr>
								<td><a href="{{route('Producto.show', $prod->id_prod)}}">{{$prod->cod_prod}}</a></td>
								<td>{{$prod->item_prod}}</td>
								<td>{{$prod->sn_prod}}</a></td>
								<td>{{$prod->dispo_prod}}</td>
								<!-- <td>{{$prod->razons_prov}}</td> -->
								<!-- <td>{{$prod->ruc_prov}}</td> -->
								<!-- <td>@if($prod->prod_serv == 1) Producto @else Servicio @endif</td> -->
                                <td class="action">
                                    <span class="actionCust">
                                        @can('editar-ps')
                                            <a href="{{route('Producto.edit', $prod->id_prod)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-ps')
                                        <form action="{{route('Producto.destroy', $prod->id_prod)}}" method="post">
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
                        {!!$productos->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection