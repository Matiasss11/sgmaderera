<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <!-- Nombre -->
            <div class="col-6">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <!-- Stock -->
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('stock') }}
                    {{ Form::number('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                    {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <!-- Precio -->
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('precio base') }}
                    {{ Form::number('precio_base', $producto->precio_base, ['class' => 'form-control' . ($errors->has('precio_base') ? ' is-invalid' : ''), 'placeholder' => 'Precio Base']) }}
                    {!! $errors->first('precio_base', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Categorías -->
            <div class="col">
                <div class="form-group" >
                    <label for="categorias">Categorías</label>
                    <select class="selectCategorias custom-select" name="categorias[]" style="width: 100%" multiple="multiple">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{ isset($categoriasDelProducto) ? (in_array($categoria->id, $categoriasDelProducto) ? 'selected="selected"' : "") : "" }}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Estado -->
            <div class="col">
                <div class="form-group" >
                    <label for="estado">Estado</label>
                    <select class="custom-select" name="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                      </select>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Descripción -->
            <div class="col">
                <div class="form-group">
                    {{ Form::label('descripción') }}
                    {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Características </label>
                <a class="addCaracteristica btn btn-primary btn-xs" > + </a>
            </div>
        </div>

        <div class="seccionCaracteristicas">
            @if (isset($caracteristicas))
                @foreach ($caracteristicas["nombres"] as $key => $item)
                    <div class="row">
                        <!-- Características -->
                        <div class="form-group col-sm-6">
                            {{ Form::text('arrayCaracteristicas[nombres][]', $caracteristicas["nombres"][$key], ['class' => 'form-control', 'id' => 'caracteristica', 'placeholder' => 'Nombre', 'required']) }}
                        </div>
                        <!-- Valor -->
                        <div class="form-group col-sm-5">
                            {!! Form::text('arrayCaracteristicas[valores][]', $caracteristicas["valores"][$key], ['class' => 'form-control','id' => 'valor', 'placeholder' => 'Valor', 'required']) !!}
                        </div>
                        <!-- Botón-->
                        <div class="form-group col-sm-1">
                            <button href="" class="btn btn-danger remove">Eliminar</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row">
            <!-- Imagen -->
            <div class="col">
                <div class="form-group" >
                    <label for="productoImagen">Imagen <br>
                        <input type="file"  id="productoImage" name="productoImage" accept="image/*">
                    </label>
                    {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('productos.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</div>

@section('scripts')

    <!-- ATENCION ESTA INGRESANDO A ZONAS TURBIAS DEL CODIGO, RIESGO DE ENCONTRAR MAGIA NEGRA -->

    <script type="text/javascript">
        //Select 2
        $(document).ready(function() {
            $('.selectCategorias').select2({width:'resolve'});
        });

        //Agregar caracteristicas
        $('.addCaracteristica').on('click',function(){
            addCaracteristica();
        });
        function addCaracteristica(){
            var fila = '<div class="row"><div class="form-group col-sm-6">'+
                        '{{ Form::text('arrayCaracteristicas[nombres][]', "", ['class' => 'form-control', 'id' => 'caracteristica', 'placeholder' => 'Nombre', 'required']) }}'+
                        '</div>'+
                        '<div class="form-group col-sm-5">'+
                            '{!! Form::text('arrayCaracteristicas[valores][]', '', ['class' => 'form-control','id' => 'valor','placeholder' => 'Valor', 'required']) !!}'+
                        '</div>'+
                        '<div class="form-group col-sm-1">'+
                            '<button href="" class="btn btn-danger remove">Eliminar</button>'+
                        '</div></div>'
            $('.seccionCaracteristicas').append(fila) ;
        }
        
        //Eliminar caracteristicas
        $('body').on('click', '.remove',function(){
            $(this).parent().parent().remove();
        });
    </script>

@endsection