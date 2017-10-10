@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subcategorias
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'subcategorias.store']) !!}

                        @include('subcategorias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
