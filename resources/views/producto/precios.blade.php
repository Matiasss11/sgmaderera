<div class="modal fade" id="precios" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar precios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route("producto.precios")}}" method="GET" role="form">
                @csrf
                @method("GET")
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('Ingresar incremento en %:') }}
                            {{ Form::number('incremento', "" ,['class' => 'form-control', 'placeholder' => 'Incremento en %']) }}
                        </div>

                        <div class="form-group" >
                            <label for="productos">Productos</label>
                            <select class="selectProductos custom-select" name="productos[]" style="width: 100%" multiple="multiple">
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                @endforeach
                                </select>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectProductos').select2({width:'resolve'});
        });
    </script>
@endsection