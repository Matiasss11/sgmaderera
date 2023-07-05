@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p style="font-size:130%"> <i aria-hidden="true"></i>Productos</p>
                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                  Nuevo producto
                                </a>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#precios">Modificar precios</button>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="tablaDetalle" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Producto</th>
										<th>Estado</th>
                                        <th>Precio Base</th>
										<th>Cantidad disponible</th>
										<th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
											<td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->estado ? "Activo" : "Inactivo" }}</td>
                                            <td>$ {{ $producto->precio_base }}</td>
											<td>{{ $producto->stock }}</td>
											<td><img src="{{ asset('storage')."/productos/".$producto->imagen }}" alt="" class="img-thumbnail img-fluid" width="70"></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#productoModal{{$producto->id}}">Detalles</button>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#stock{{$producto->id}}">Cambiar stock</button>
                                            </td>
                                        </tr>

                                        <!-- Modals detalles -->
                                        @include('producto.show')

                                        <!-- Modals stock -->
                                        @include('producto.stock')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>

    <!-- Modals detalles -->
    @include('producto.precios')

    @push('scripts')
        <script src="{{asset('js/tablaDetalle.js')}}"></script>
    @endpush

@endsection