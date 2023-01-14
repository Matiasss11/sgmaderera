<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="modal fade" id="modal-create-empresarial" data-backdrop="static" tabindex="-1" role="dialog">
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
                        <div class="col-8">
                            <div class="form-group">
                                <label for="razon_social"> Razon Social</label>
                                <input type="string"name="razon_social"maxlength="30"value="{{old('razon_social')}}"class="form-control"
                                    placeholder="Ingrese la razon social..."title="Introduzca la razon social">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cuil"> CUIT</label>
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

    

@endpush

