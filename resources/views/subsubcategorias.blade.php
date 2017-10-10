@extends('layouts.app')

@section('content')

 <table class="table table-hover">
  <thead> 
  <tr> <th></th> 
  <th>
    @include('search.form')
  </th> 
  <th>
  {!! Form::open(['url' => 'foo/bar', 'class'=>'form navbar-form navbar-right searchform']) !!}
    <a href="{!! route('subsubcategorias.create') !!}" class="btn btn-primary "><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Nuevo</a>
{!! Form::close() !!}
  </th><th></th> <th></th></tr>
  <tr> <th>#</th> <th>Subsubcategorias</th> <th>Subcategorias</th><th>Categorias</th> <th>Editar </th><th>Copiar json</th></tr> </thead>
  <tbody> 
  	@php
    $host= $_SERVER["HTTP_HOST"];
  		foreach ($subsubcategorias as $subsubcategoria) {
  			echo '<tr><td>'.$subsubcategoria['id'].'</td><td>'.$subsubcategoria['subsubcategoria'].'</td><td>'.$subsubcategoria['subcategoria'].'</td><td>'.$subsubcategoria['nombre'].'</td><td><a href="http://'.$host.'/subsubcategorias/'.$subsubcategoria['id'].'/edit" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td><td><a href="#" class="'.$subsubcategoria['url'].'"><i class="fa fa-clipboard" aria-hidden="true"></i>
</a></td></tr>';
        $cadena="<script>var clipboard = new Clipboard('.";
        $cadena.=$subsubcategoria['url'];
        $cadena.="', {text: function() {return '";
        $cadena.="http://";
        $cadena.=$host;
        $cadena.="/subsubcategorias/json/";
        $cadena.=$subsubcategoria['url'];
        $cadena.="';}});clipboard.on('success', function(e) {console.log(e);});clipboard.on('error', function(e) {console.log(e);});</script>";
  			echo $cadena;
  		}
  	@endphp
  	
  </tbody>

</table>
@endsection
