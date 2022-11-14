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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre"> Nombre</label>
                                <input type="string"name="nombre"maxlength="30"value="{{old('nombre')}}"class="form-control"
                                    placeholder="Ingrese el nombre..."title="Introduzca el nombre">
                            </div>
                        </div>
                        <div class="col-6">
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
                                <input type="string"name="telefono"maxlength="30"value="{{old('telefono')}}"class="form-control"
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
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group" style="text-align:center">
                        <label>

                        </label>
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

    <script src="{{asset('js/tablaDetalle.js')}}"></script>

    <script>
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
        
            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
        
            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }
    </script>

@endpush

