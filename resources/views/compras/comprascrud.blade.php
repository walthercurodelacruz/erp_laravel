@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<style>
    .modal{
      background-color: rgba(0,0,0,.6);
      position:fixed;
      top:0;  right:0;  bottom:0;  left:0;
      opacity:0;
      pointer-events:none;
      transition: all .5s ease;
      z-index: 1000;
      display: grid;
      align-items: center;
    }
    .modal:target{
      opacity:1;
      pointer-events:auto;
    }
    .modal .modal-contenido{
      background-color:white;
      width: 50%;
      padding: 20px 20px 10px 20px;
      margin: auto;
      position: relative;
      border-radius: 2px;
    }
    .modal .modal-contenido a{
        position: absolute;
        top: 1rem; right: 1rem;
    }
    .modal .modal-contenido a i{
        font-size: 26px;
    }
</style>
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
				<p><h5 align="right">Conectado | {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h5></p>	
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Listado de items</p>
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">OP</td>
                                <td style="min-width:100px;">Item</td>
                                <td style="min-width:100px;">Nota</td>
                                <td style="min-width:100px;">Cantidad</td>
                                <td style="min-width:100px;">Proveedor</td>
                                <td style="width:170px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-buscar"><form method="GET">
                                <td><input type="text" name="op" placeholder="Buscar" value="{{$op}}"></td>
                                <td><input type="text" name="item" placeholder="Buscar" value="{{$item}}"></td>
                                <td><input type="text" name="nota" placeholder="Buscar" value="{{$nota}}"></td>
                                <td><input type="text" name="cant" placeholder="Buscar" value="{{$cant}}"></td>
                                <td></td>
                                <td><button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button></td>
                                </form>
                            </tr>
                            @if(count($compras)<=0)
                                <tr>
                                    <td colspan="6">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($compras as $compra)
                                    <tr>
                                        <td>{{$compra->cod_op}}</td>
                                        <td>{{$compra->item_compras}}</td>
                                        <td>{{$compra->nota_compras}}</td>
                                        <td>{{$compra->cant_compras}}</td>
                                        <td>{{$compra->prov_compras}}</td>
                                        <td class="action">
                                        	<span class="actionCust">
                                                <a href="#{{$compra->id_compras}}">ver</a>
                                            </span>
                                            <span class="actionCust">
                                                @can('editar-compras')
                                                <a href="{{route('Compras.edit', $compra->id_compras)}}"><i class='bx bxs-edit-alt'></i></a>
                                                @endcan
                                            </span>
                                        </td>                       
                                    </tr>
                                    <div id="{{$compra->id_compras}}" class="modal">
                                        <div class="modal-contenido">
                                            <a href="#"><i class='bx bxs-x-circle'></i></a>
                                            <div class="box no-border">
												<section class="heading">
                                                	<div class="title">Detalles del item</div>
                                                </section>
                                                <section class="details">
                                                    <div>   
                                                        <p class="cod">OP: <span>{{$compra->cod_op}}</span></p>
                                                        <p>Nota: <span>{{$compra->nota_compras}}</span></p>
                                                        <p>Proveedor: <span>{{$compra->prov_compras}}</span></p>
                                                        <p>Costo: <span>{{$compra->costo_compras}}</span></p>
                                                        <p>Vendedor: <span>{{$compra->asig_compras}}</span></p>
                                                        <p>Responsable: <span>{{$compra->respon_compras}}</span></p>
                                                    </div>
                                                    <div>
                                                        <p>Item:<span>{{$compra->item_compras}}</span></p>
                                                        <p>Cantidad: <span>{{$compra->cant_compras}}</span></p>
                                                        <p>Moneda: <span>{{$compra->mon_compras}}</span></p>
                                                        <p>Cot Proveedor:<span>{{$compra->cot_prov_compras}}</span></p>
                                                        <p>Tiempo entrega: <span>{{$compra->entrega_compras}}</span></p>
                                                        <p>OCP: <span>{{$compra->ocp_compras}}</span></p>
                                                    </div>
                                                </section> 
                                            </div>
                                        </div>  
                                    </div>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$compras->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection