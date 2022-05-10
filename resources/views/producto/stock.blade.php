<div class="modal fade" id="stock{{$producto->id}}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $producto->nombre }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route("producto.stock", $producto->id)}}" method="GET" role="form">
                @csrf
                @method("GET")
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('Ingresar aumento de stock:') }}
                            {{ Form::number('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
                            <input type="number" name="producto_id" value="{{$producto->id}}" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>