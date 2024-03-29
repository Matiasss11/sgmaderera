{!! Form::model(Request::only(
    ['sexo_id','desde','hasta']),
    ['url' => 'user/', 'method'=>'GET', 'autocomplete'=>'on', 'role'=>'search']

    )!!}
    
<div class="row">

<div class="col-3 ">
    <label for="desde">Fecha Desde</label>
    <input
        type="date"
        name="desde"
        id="desde"
        class="fecha form-control"
        value="{{$desde}}"
    >
</div>


<div class="col-3 ">
    <label for="hasta">Fecha Hasta</label>
    <input
        type="date"
        name="hasta"
        id="hasta"
        class="fecha form-control"
        value="{{$hasta}}"
    >
</div>


<div class="col-3 ">
    <label for=""></label>
    <div class="form-group">
        <span class="input-group-btn">
            <button
                title="buscar"
                type="submit"
                id="bt_add"
                name="filtrar"
                class="btn btn-primary btn-sm">
                <i class="fa fa-search"></i> Buscar
            </button>

            <a

            href= "{{ route('user.index') }}"
            class="btn btn-default btn-sm"
            >
            <i class="fas fa-eraser"></i>
                ... Limpiar
        </a>

        </span>
    </div>
</div>

</div>




{{Form::close()}}

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){


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
