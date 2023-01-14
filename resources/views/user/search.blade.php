{!! Form::model(Request::only(
    ['desde','hasta', 'estado_id']),
    ['url' => 'user/', 'method'=>'GET', 'autocomplete'=>'on', 'role'=>'search']

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
    
    <div class="col-3">
        <div class="form-group">
            <label for="estado_id">Habilitado</label>
            <select
                name="estado_id"
                id="estado_id"
                class="custom-select"
                >
                @foreach ($estados as $estado)
                    <option
                        value="{{$estado->id}}"
                        @if($estado_id!=null && $estado_id==$estado->id)
                            selected
                        @endif
                    >
                    {{$estado->nombre}}
                    </option>
                @endforeach
                <option
                    value="0" @if($estado_id == null || $estado_id==0) selected @endif>
                    -- Todos los estados --
                </option>
            </select>
        </div>
    </div>
    <div class="col-3">
        <label for="">&nbsp;</label>
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
    var select2 = $("#estado_id").select2({width:'100%'});
    select2.data('select2').$selection.css('height', '34px');

});







</script>
@endpush
