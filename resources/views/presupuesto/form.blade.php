<div class="box box-info padding-1">
    {{-- <div class="box-body">
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::text('cliente_id', $presupuesto->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('venta_id') }}
            {{ Form::text('venta_id', $presupuesto->venta_id, ['class' => 'form-control' . ($errors->has('venta_id') ? ' is-invalid' : ''), 'placeholder' => 'Venta Id']) }}
            {!! $errors->first('venta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div> --}}

    @if ($presupuesto->id)
        @livewire('lista-de-productos', ['presupuesto_id' => $presupuesto->id])
    @else
        @livewire('lista-de-productos')
    @endif
    
</div>