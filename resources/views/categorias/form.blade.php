
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($categoria)->nombre) }}" minlength="1" placeholder="Registre nombre ...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

