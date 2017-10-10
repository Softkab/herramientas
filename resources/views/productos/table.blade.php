<table class="table table-responsive" id="productos-table">
    <thead>
        <th>Nombre</th>
        <th>Idcategoria</th>
        <th>Idsubcategoria</th>
        <th>Url</th>
        <th>Resumen</th>
        <th>Descripcion</th>
        <th>Especificaciones</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td>{!! $productos->nombre !!}</td>
            <td>{!! $productos->idcategoria !!}</td>
            <td>{!! $productos->idsubcategoria !!}</td>
            <td>{!! $productos->url !!}</td>
            <td>{!! $productos->resumen !!}</td>
            <td>{!! $productos->descripcion !!}</td>
            <td>{!! $productos->especificaciones !!}</td>
            <td>{!! $productos->created_at !!}</td>
            <td>{!! $productos->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $productos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>