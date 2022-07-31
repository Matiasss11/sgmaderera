@extends('layouts.admin')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementos as $elemento)
                                <tr>
                                    <td>{{ $elemento['nombre'] }}</td>
                                    <td>{{ $elemento['cantidad'] }}</td>
                                    <td>${{ number_format($elemento['precio_unitario'], 2, '.', ',')}}</td>
                                    <td>${{ number_format($elemento['precio'], 2, '.', ',')}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total</td>
                                <td colspan="1" class="bg-warning">${{ number_format($precio_total, 2, '.', ',')}}</td>
                            </tr>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
