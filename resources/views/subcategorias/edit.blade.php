@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categorias
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subcategorias, ['route' => ['subcategorias.update', $subcategorias->id], 'method' => 'patch']) !!}

                        @include('subcategorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection