@extends('layouts.app')

@section('template_title')
    {{ $presupuesto->name ?? 'Show Presupuesto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Presupuesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('presupuestos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $presupuesto->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Venta Id:</strong>
                            {{ $presupuesto->venta_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
