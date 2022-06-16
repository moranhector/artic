
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
    <label for="descripcion" class="col-md-2 control-label">Descripcion</label>
    <div class="col-md-10">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ old('descripcion', optional($articulo)->descripcion) }}" minlength="1" placeholder="Registre descripción -..">
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
    <label for="precio" class="col-md-2 control-label">Precio</label>
    <div class="col-md-10">
        <input class="form-control" name="precio" type="text" id="precio" value="{{ old('precio', optional($articulo)->precio) }}" min="1" max="999999999" placeholder="Enter precio here..." step="any">
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
    <label for="costo" class="col-md-2 control-label">Costo</label>
    <div class="col-md-10">
        <input class="form-control" name="costo" type="text" id="costo" value="{{ old('costo', optional($articulo)->costo) }}" min="1" max="999999999" placeholder="Enter costo here..." step="any">
        {!! $errors->first('costo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
    <label for="categoria_id" class="col-md-2 control-label">Categoria</label>
    <div class="col-md-10">
        <select class="form-control" id="categoria_id" name="categoria_id">
        	    <option value="" style="display: none;" {{ old('categoria_id', optional($articulo)->categoria_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select categoria</option>
        	@foreach ($categorias as $key => $categorium)
			    <option value="{{ $key }}" {{ old('categoria_id', optional($articulo)->categoria_id) == $key ? 'selected' : '' }}>
			    	{{ $categorium }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('categoria_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

