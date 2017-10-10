@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subsubcategorias
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subsubcategorias, ['route' => ['subsubcategorias.update', $subsubcategorias->id], 'method' => 'patch']) !!}

                        @include('subsubcategorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection