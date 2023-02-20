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
        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSeleccionarCliente">Agregar Cliente</button> --}}
        {{-- <button type="button" class="btn btn-primary" wire:click='guardar'>Guardar presupuesto</button> --}}
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalGuardar">Guardar presupuesto</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalReserva">Reservar</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalSeleccionarCliente">Vender</button>
        {{-- <button type="button" class="btn btn-primary" wire:click='ejecutarVenta'>Ejecutar venta</button> --}}
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
                                        @if ($productos)
                                            @foreach ($productos as $producto)
                                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                            @endforeach
                                        @endif
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        {{-- @if (isset($product) && $cantidad) --}}
                            <button type="button" class="btn btn-primary" wire:click="agregarProductos({{$producto->id}},{{$cantidad}})">Agregar</button>
                        {{-- @endif --}}
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="Label" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-body">
                            {{-- Lista de Clientes --}}
                            <div class="form-group">
                                <label for="cliente_id">Cliente</label>
                                <select class="custom-select" wire:model="cliente_id" style="width: 100%"required>
                                    <option value="">Seleccione un cliente</option>
                                        @if ($clientes)
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">
                                                    @if (@isset($cliente->nombre))
                                                        {{$cliente->nombre}} {{$cliente->apellido}}
                                                    @else
                                                        {{$cliente->razon_social}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        @endif
                                    </option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="forma_pago_id"> Foma de Pago</label>
                                <select name="forma_pago_id" wire:model="forma_pago_id" id="forma_pago_id"class="custom-select"required>
                                    <option value="0"disabled="true"selected="true"title="-Seleccione una opcion-">
                                        -Seleccione una opcion-
                                    </option>
                                    @foreach ($formas as $forma)
                                        <option
                                            value="{{$forma->id}}">{{$forma->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="telefonica">
                                    Atencion Telefonica
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="mostrador">
                                    Atencion en Mostrador
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="guardar({{$cliente->id}},{{$atencion}})">Guardar presupuesto</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="Label" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Programar retiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <div class="card-body">
                            {{-- Fecha de retiro --}}
                            <div class="form-group">
                                {{ Form::label('Fecha de retiro') }}
                                <input type="date" wire:model="fecha_de_retiro" class="form-control" placeholder = 'Fecha de retiro'>
                            </div>
                            {{-- Lista de Clientes --}}
                            <div class="form-group">
                                <label for="cliente_id">Cliente</label>
                                <select class="custom-select" wire:model="cliente_id" style="width: 100%"required>
                                    <option value="">Seleccione un cliente</option>
                                        @if ($clientes)
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">
                                                    @if (@isset($cliente->nombre))
                                                        {{$cliente->nombre}} {{$cliente->apellido}}
                                                    @else
                                                        {{$cliente->razon_social}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        @endif
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="forma_pago_id"> Foma de Pago</label>
                                <select name="forma_pago_id"id="forma_pago_id"class="custom-select"required>
                                    <option value="0"disabled="true"selected="true"title="-Seleccione una opcion-">
                                        -Seleccione una opcion-
                                    </option>
                                    @foreach ($formas as $forma)
                                        <option
                                            value="{{$forma->id}}">{{$forma->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="telefonica">
                                    Atencion Telefonica
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="mostrador">
                                    Atencion en Mostrador
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="ejecutarReserva({{$cliente->id}},{{$atencion}})">Reservar</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSeleccionarCliente" tabindex="-1" aria-labelledby="Label" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <div class="card-body">
                            {{-- Lista de Clientes --}}
                            <div class="form-group">
                                <label for="cliente_id">Cliente</label>
                                <select name="cliente_id"id="cliente_id"class="custom-select"required>
                                    <option value="0"disabled="true"selected="true"title="-Seleccione una opcion-">
                                        -Seleccione una opcion-
                                    </option>
                                    @foreach ($clientes as $cliente)
                                        <option
                                            value="{{$cliente->id}}">
                                            @if (@isset($cliente->nombre))
                                                {{$cliente->nombre}} {{$cliente->apellido}}
                                            @else
                                                {{$cliente->razon_social}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="forma_pago_id"> Foma de Pago</label>
                                <select name="forma_pago_id"id="forma_pago_id"class="custom-select"required>
                                    <option value="0"disabled="true"selected="true"title="-Seleccione una opcion-">
                                        -Seleccione una opcion-
                                    </option>
                                    @foreach ($formas as $forma)
                                        <option
                                            value="{{$forma->id}}">{{$forma->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="telefonica">
                                    Atencion Telefonica
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" wire:model="atencion" value="mostrador">
                                    Atencion en Mostrador
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="ejecutarVenta({{$cliente->id}},{{$atencion}})">Ejecutar venta</button>
                    </div>
            </div>
        </div>
    </div>

</div>
