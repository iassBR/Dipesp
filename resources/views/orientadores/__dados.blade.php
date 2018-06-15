<div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-6"> 
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Informe o nome aqui" value="{{isset($orientador)  ? $orientador->nome  : old('nome')}}">
            @if($errors->has('nome'))
                <span class="help-block">
                    <strong>{{$errors->first('nome')}}</strong>
                </span>
            @endif
    </div>
</div>
<div class="form-group {{ $errors->has('matricula') ? ' has-error' : '' }}">
    <label for="matricula" class="col-sm-2 control-label">Matrícula</label>
    <div class="col-sm-6"> 
        <input name="matricula" type="text" class="form-control" id="matricula" placeholder="Informe a matrícula aqui" value="{{isset($orientador) ? $orientador->matricula  : old('matricula')}}">
        @if($errors->has('matricula'))
            <span class="help-block">
                <strong>{{$errors->first('matricula')}}</strong>
            </span>
        @endif
    </div>
</div>  