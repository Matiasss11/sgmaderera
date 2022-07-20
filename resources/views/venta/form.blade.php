<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $venta->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_de_retiro') }}
            {{ Form::text('fecha_de_retiro', $venta->fecha_de_retiro, ['class' => 'form-control' . ($errors->has('fecha_de_retiro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Retiro']) }}
            {!! $errors->first('fecha_de_retiro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>