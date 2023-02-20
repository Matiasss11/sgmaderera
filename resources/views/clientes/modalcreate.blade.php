<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="modal fade" id="modal-create" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar un cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nombre"> Nombre</label>
                                <input type="string"name="nombre"maxlength="30"value="{{old('nombre')}}"class="form-control"
                                    placeholder="Ingrese el nombre..."title="Introduzca el nombre">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="apellido"> Apellido</label>
                                <input type="string"name="apellido"maxlength="30"value="{{old('apellido')}}"class="form-control"
                                    placeholder="Ingrese el apellido..."title="Introduzca el apellido">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cuil"> CUIL</label>
                                <input type="string"name="cuil"maxlength="30"value="{{old('cuil')}}"class="form-control"
                                    placeholder="Ingrese el cuil..."title="Introduzca el cuil">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="telefono"> Telefono</label>
                                <input type="string"name="telefono"id="telefono"maxlength="30"value="{{old('telefono')}}"class="form-control"
                                    placeholder="Ingrese el telefono..."title="Introduzca el telefono">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email"> Email</label>
                                <input type="string"name="email"maxlength="30"value="{{old('email')}}"class="form-control"
                                    placeholder="Ingrese el email..."title="Introduzca el email">
                            </div>
                        </div>
                        <div class="col-4">
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
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="">Direccion</h5>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Provincia</label>
                                <select  name="provincia_id"id="provincia_id"class="provincia_id form-control"required>
                                    <option value="0"disabled="true"selected="true"title="Seleccione un provincia">
                                        -Seleccione un provincia-
                                    </option>
                                    @foreach ($provincias as $provincia)
                                        <option
                                            value="{{$provincia->id }}">{{$provincia->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <label>Ciudad</label>
                                <select name="ciudad_id"id="ciudad_id"class="ciudad_id form-control"required>
                                    <option value="0"disabled="true"selected="true"title="Seleccione una ciudad">
                                        -Seleccione una ciudad-
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="direccion">
                                    Calle
                                </label>
                                <input type="string"name="direccion"value="{{old('direccion')}}"class="form-control"
                                    placeholder="Introdusca la direccion"title="Introduzca la direccion"required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="piso">
                                    Piso
                                </label>
                                <input type="string"name="piso"value="{{old('piso')}}"class="form-control"
                                    placeholder="Introdusca el piso"title="Introduzca el piso">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="departamento">
                                    Departamento
                                </label>
                                <input type="string"name="departamento"value="{{old('departamento')}}"class="form-control"
                                    placeholder="Introdusca el departamento"title="Introduzca la departamento">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group" style="text-align:center">
                        <br>
                        <button title="Limpiar" class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                        <button title="Guardar" id="confirmar" class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')

    <script type="text/javascript">

        $(document).ready(function(){


            $("select").select2({width:'100%'});



            $(document).on('change','.provincia_id',function(){
                var provincia_id=$(this).val();
                var div=$(this).parent();
                var op=" ";
                console.log(provincia_id);



                $.ajax({
                    type:'get',
                    url:'{!!URL::to('cliente/encontrarCiudad')!!}',
                    data:{'id':provincia_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-Seleccione una ciudad-</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        div.find('.ciudad_id').html(" ");
                        div.find('.ciudad_id').append(op);
                    },
                    error:function(){
                    }
                });
            });
        
        
            $('#telefono').mask('(0000) 00-0000');
        
        });



    </script>

@endpush

