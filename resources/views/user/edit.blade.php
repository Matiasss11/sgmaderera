@extends('layouts.admin')
  <!-- Extiende de layout -->

@section('content')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Editar Usuario</h3>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="perfil/show">Indice de Usuarios</a></li>
            <li class="breadcrumb-item active">Editar Usuario</li>
        </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
{!! Form::model($user, ['method' => 'PATCH','route' => ['user.update',$user->id]]) !!}
        {{Form::token()}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card card-dark">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                            <label for="name">Nombre de Usuario</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="email"> Email </label>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Password</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control', 'required'=>true)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card card-dark">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group" >
                        <strong>Lista de Roles</strong>
                        <br><br>
                            @foreach ($roles as $role)
                                <label>
                                    {{ Form::checkbox('roles[]', $role->id, null) }}
                                    {{ $role->name }}
                                </label>
                                <br>
                            @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group" style="text-align:center">
                        <label>

                        </label>
                        <br><br><br><br><br>
                        <button title="Limpiar" class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                        <button title="Guardar" id="confirmar" class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

{!!Form::close()!!}

    @push('scripts')
    <script type="text/javascript">    
        
@endpush

@endsection

