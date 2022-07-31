<div>
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elementos as $elemento)
                <tr>
                    <td>{{ $elemento['nombre'] }}</td>
                    <td>{{ $elemento['cantidad'] }}</td>
                    <td>${{ number_format($elemento['precio_unitario'], 2, '.', ',')}}</td>
                    <td>${{ number_format($elemento['precio'], 2, '.', ',')}}</td>
                    <td><a class="btn btn-danger btn-sm" wire:click="quitarProductos({{$elemento['producto_id']}})"><i class="fa fa-fw fa-trash"></i> Delete</a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Total</td>
                <td colspan="2" class="bg-warning">${{ number_format($precio_total, 2, '.', ',')}}</td>
            </tr>
        </tbody>
    </table>

    <div class="box-footer mt20">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProductos">Agregar productos</button>
        <button type="button" class="btn btn-primary" wire:click='ejecutarVenta'>Ejecutar venta</button>
        <button type="button" class="btn btn-primary" wire:click='ejecutarReserva'>Guardar</button>
    </div>

    {{-- Modals --}}

    <div class="modal fade" id="modalAgregarProductos" tabindex="-1" aria-labelledby="Label" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <div class="card-body">
                            {{-- Producto --}}
                            <div class="form-group" >
                                <label for="productos">Producto</label>
                                <select class="custom-select" wire:model="producto_id" style="width: 100%" wire:change="mostrarStock" required>
                                    <option value="">Seleccione un producto</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            {{-- Cantidad --}}
                            <div class="form-group">
                                {{ Form::label('Ingresar cantidad') }}
                                <input type="number" wire:model="cantidad" class="form-control" placeholder = 'Cantidad'>
                            </div>
                            {{-- Stock --}}
                            <div class="form-group">
                                {{ Form::label('Stock disponible') }}
                                <input type="number" wire:model="stock" class="form-control" placeholder = 'Stock' disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="agregarProductos({{$producto->id}},{{$cantidad}})">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
</div>
