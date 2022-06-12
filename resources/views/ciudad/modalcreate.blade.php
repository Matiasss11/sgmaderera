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
                <h5 class="modal-title">Registrar una Ciudad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/ciudad/guardar">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tipo_documento_id">País</label>
                                <select name="pais_id"id="pais_id"class="pais_id custom-select"required>
                                    <option value="0"disabled="true"selected="true"title="-Seleccione una pais-">
                                        -Seleccione una pais-
                                    </option>
                                    @foreach ($paises as $pais)
                                        <option
                                            value="{{$pais->id }}">{{$pais->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <label>Provincia</label>
                                <select name="provincia_id"id="provincia_id"class="provincia_id form-control"required>
                                    <option value="0"disabled="true"selected="true"title="Seleccione una provincia">
                                        -Seleccione una provincia-
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nomrazon_socialbres"> Nombre</label>
                                <input type="string"name="nombre"maxlength="30"value="{{old('nombre')}}"class="form-control"
                                    placeholder="Ingrese el nombre..."title="Introduzca el nombre" onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nomrazon_socialbres"> Código Postal</label>
                                <input type="string"name="codigo_postal"maxlength="30"value="{{old('codigo_postal')}}"class="form-control"
                                    placeholder="Ingrese el código postal..."title="Introduzca el código postal" onkeypress="return soloNumeros(event)">
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