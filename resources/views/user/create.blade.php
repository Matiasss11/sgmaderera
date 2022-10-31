@extends('layouts.admin')
  <!-- Extiende de layout -->
@section('navegacion')
    <li class="breadcrumb-item"><a href="/user">Indice de Usuarios</a></li>
    <li class="breadcrumb-item active">Crear Usuarios</li>
@endsection

@section('content')

<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }
</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('errors.request')
        @include('user.mensaje')
        {!!Form::open(array('url'=>'user','method'=>'POST','autocomplete'=>'off','files' => true,))!!}
        {{Form::token()}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-dark">
            <div class="card-header">
                <div class="card-title">
                    <p style="font-size:130%"> <i class="fa fa-key" aria-hidden="true"></i> Perfil de Cuenta</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre de Usuario
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                    <input
                                        type="string"
                                        name="name"
                                        maxlength="30"
                                        value="{{old('name')}}"
                                        class="form-control"
                                        placeholder="Ingrese el nombre de la cuenta..."
                                        title="Ingrese el nombre de la cuenta">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="email">
                            E-mail
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input
                                type="email"
                                name="email"
                                value="{{old('email')}}"
                                class="input-group form-control"
                                placeholder="uncorreo@mail.com..."
                                title="Introduzca un correo electrónico">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="password">
                                Contraseña
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    min="8"
                                    maxlength="13"
                                    value="{{old('password')}}"
                                    class="form-control"
                                    placeholder="********..."
                                    title="Introduzca una contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirmar Constraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirm"
                                    placeholder="********..."
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="sucursal_id">sucursal</label>
                            <select name="sucursal_id"id="sucursal_id"class="sucursal_id custom-select"required>
                                <option value="0"disabled="true" selected="true"title="-Seleccione una sucursal-">
                                    -Seleccione una sucursal-
                                </option>
                                @foreach ($sucursales as $sucursal)
                                    <option
                                        value="{{$sucursal->id }}">{{$sucursal->razon_social}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="foto">Foto de Perfil</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-file-image" aria-hidden="true"></i></span>
                                </div>
                                <input
                                    id="file"
                                    type="file"
                                    name="foto"
                                    class="form-control img-responsive">
                            </div>
                            <hr>
                            <div id="preview"></div>
                        </div>
                    </div>
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
</div>

{!!Form::close()!!}

    @push('scripts')
    <script type="text/javascript">
        document.getElementById("file").onchange = function(e) {
            let reader = new FileReader();

            reader.onload = function(){
                let preview = document.getElementById('preview'),
                image = document.createElement('img');

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

        $(document).ready(function(){
            $("select").select2({width:'100%'});
        });

</script>
@endpush

@endsection

