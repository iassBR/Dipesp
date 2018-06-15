<div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-6"> 
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Informe o nome aqui" value="{{isset($papel)  ? $papel->nome  : old('nome')}}">
            @if($errors->has('nome'))
                <span class="help-block">
                    <strong>{{$errors->first('nome')}}</strong>
                </span>
            @endif
    </div>
</div>

<div class="form-group {{ $errors->has('descricao') ? ' has-error' : '' }}">
    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-6"> 
        <input name="descricao" type="text" class="form-control" id="descricao" placeholder="Informe a descrição aqui" value="{{isset($papel)  ? $papel->descricao  : old('descricao')}}">
            @if($errors->has('descricao'))
                <span class="help-block">
                    <strong>{{$errors->first('descricao')}}</strong>
                </span>
            @endif
    </div>
</div>
