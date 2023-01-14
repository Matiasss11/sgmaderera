
{!! Form::model(Request::only(
    ['desde','hasta', 'subtipo_movimiento_id', 'tipo_movimiento_id']),
    ['url' => 'movimiento', 'method'=>'GET', 'autocomplete'=>'on', 'role'=>'search'] 
    
    )!!}

    <style>
        .select2-container .select2-selection {
        line-height: 1.6 !important;
        height: 2rem !important;
        border-radius: 3px !important;
        }

        .altura {
            height: 2rem !important;
        }

    </style>

    <div class="row">

    <div class="col-2">
        <label for="desde">Fecha Desde</label>
        <input
            type="date"
            name="desde"
            id="desde"
            class="fecha form-control altura"
            value="{{$desde}}"
        >        
    </div>    


    <div class="col-2 ">
        <label for="hasta">Fecha Hasta</label>
        <input
            type="date"
            name="hasta"
            id="hasta"
            class="fecha form-control altura"
            value="{{$hasta}}"
        >       
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="tipo_movimiento_id">Movimiento</label>
            <select
                name="tipo_movimiento_id"
                id="tipo_movimiento_id"
                class="custom-select"
                >
                @foreach ($tipomovimientos as $tipomovimiento)
                    <option
                        value="{{$tipomovimiento->id}}"
                        @if($tipo_movimiento_id!=null && $tipo_movimiento_id==$tipomovimiento->id)
                            selected
                        @endif
                    >
                    {{$tipomovimiento->nombre}}
                    </option>
                @endforeach
                <option
                    title="Todos los movimientos"
                    value="0" @if($tipo_movimiento_id == null || $tipo_movimiento_id==0) selected @endif>
                    -- Movimientos --
                </option>
            </select>
        </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="subtipo_movimiento_id">Concepto</label>
            <select
                name="subtipo_movimiento_id"
                id="subtipo_movimiento_id"
                class="custom-select"
                >
                @foreach ($subtipomovimientos as $subtipomovimiento)
                    <option
                        value="{{$subtipomovimiento->id}}"
                        @if($subtipo_movimiento_id!=null && $subtipo_movimiento_id==$subtipomovimiento->id)
                            selected
                        @endif
                    >
                    {{$subtipomovimiento->nombre}}
                    </option>
                @endforeach
                <option
                    title="Todos los conceptos"
                    value="0" @if($subtipo_movimiento_id == null || $subtipo_movimiento_id==0) selected @endif>
                    -- Conceptos --
                </option>
            </select>
        </div>
    </div>
       

    <div class="col-4 "  >
        <label for="">&nbsp;</label>
        <div class="form-group">
                <button
                    title="buscar"
                    type="submit"
                    id="bt_add"
                    name="filtrar"
                    class="btn btn-primary btn-sm">
                    <i class="fa fa-search"></i> Buscar
                </button>
                <button 
                    class="btn btn-danger btn-sm"
                    name="pdf"
                    type="submit"
                    >
                    <i class="fas fa-file-pdf fa-md" aria-hidden="true"></i>
                    PDF
                </button>
                <a 
                
                href= "{{ route('movimiento.index') }}"
                class="btn btn-default btn-sm"
                >
                <i class="fas fa-eraser"></i>
                    ... Limpiar
            </a>
        </div>
    </div>
    
    </div>





{{Form::close()}}

@push('scripts')     
<script type="text/javascript">
$(document).ready(function(){

    $("select").select2({width:'100%'});
    //si existe un cambio en Fecha Desde
    $('#desde').change(function() {
        
        //Se captura su valor
        var desde = $(this).val();
        console.log(desde, 'Se cambio la fecha DESDE')
        //y establesco ese valor capturado como minimo en Fecha Hasta
        $('#hasta').attr({"min" : desde});;


        });

    //si existe un cambio en Fecha Hasta
    $('#hasta').change(function() {
      
        //Se captura su valor
        var hasta = $(this).val();
        console.log(hasta, 'Se cambio la fecha HASTA');

        //si ese valor es diferente a nulo (osea si hay algo dentro)
        if (hasta != "")
        {
            //se deshabilita el desde (para evitar que desde sea mayor que hasta)
            $("#desde").prop('disabled', true);

        }



      });

     //si se clickea en "FIltrar"
      $('#bt_add').click(function () { 
        //se debe refrescar (si es que hubo) la prop disabled de desde
        $("#desde").prop('disabled', false);
       
 
      });
    

});




    


</script>
@endpush
