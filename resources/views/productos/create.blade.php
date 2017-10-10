@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Productos
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => 'nuevo/producto']) !!}

                        @include('productos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
