@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $producto->nombre}}  
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('productos.show_fields')
                    <button class="btn btn-primary" onclick="history.go(-1)">
                    &laquo; Vover
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
