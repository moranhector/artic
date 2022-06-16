@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Articulos</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('articulos.articulos.create') }}" class="btn btn-success" title="Create New Articulos">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($articulosObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Articulos Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Costo</th>
                            <th>Categoria</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($articulosObjects as $articulos)
                        <tr>
                            <td>{{ $articulos->descripcion }}</td>
                            <td>{{ $articulos->precio }}</td>
                            <td>{{ $articulos->costo }}</td>
                            <td>{{ optional($articulos->categoria)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('articulos.articulos.destroy', $articulos->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('articulos.articulos.show', $articulos->id ) }}" class="btn btn-info" title="Show Articulos">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('articulos.articulos.edit', $articulos->id ) }}" class="btn btn-primary" title="Edit Articulos">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Articulos" onclick="return confirm(&quot;Click Ok to delete Articulos.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $articulosObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection