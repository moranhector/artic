@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Articulo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('articulos.articulo.destroy', $articulo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('articulos.articulo.index') }}" class="btn btn-primary" title="Show All Articulo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('articulos.articulo.create') }}" class="btn btn-success" title="Create New Articulo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('articulos.articulo.edit', $articulo->id ) }}" class="btn btn-primary" title="Edit Articulo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Articulo" onclick="return confirm(&quot;Click Ok to delete Articulo.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Descripcion</dt>
            <dd>{{ $articulo->descripcion }}</dd>
            <dt>Precio</dt>
            <dd>{{ $articulo->precio }}</dd>
            <dt>Costo</dt>
            <dd>{{ $articulo->costo }}</dd>
            <dt>Categoria</dt>
            <dd>{{ optional($articulo->categoria)->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection