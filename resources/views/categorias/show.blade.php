@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Categoria' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('categorias.categoria.destroy', $categoria->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('categorias.categoria.index') }}" class="btn btn-primary" title="Show All Categoria">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('categorias.categoria.create') }}" class="btn btn-success" title="Create New Categoria">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('categorias.categoria.edit', $categoria->id ) }}" class="btn btn-primary" title="Edit Categoria">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Categoria" onclick="return confirm(&quot;Click Ok to delete Categoria.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $categoria->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection