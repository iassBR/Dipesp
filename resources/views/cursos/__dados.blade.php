<div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-6"> 
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Informe o nome aqui" value="{{isset($curso)  ? $curso->nome  : old('nome')}}">
            @if($errors->has('nome'))
                <span class="help-block">
                    <strong>{{$errors->first('nome')}}</strong>
                </span>
            @endif
    </div>
</div>

<div class="form-group {{$errors->has('modalidade_id') ? 'has-error' : ''}}">
    <label for="modalidade_id" class="col-sm-2 control-label">Selecione a modalidade do curso</label>
    <div class="col-sm-6">
        <select class="form-control" name="modalidade_id" value="{{old('modalidade_id')}}" >
            <option value="">Selecione</option>
            @foreach($modalidades as $modalidade)            
                <option value="{{$modalidade->id}}"
                 {{  (isset($curso) && $curso->modalidade_id == $modalidade->id ? 'selected' : '') }}>
                  {{$modalidade->tipo}} </option>            
            @endforeach
        </select>
        @if($errors->has('modalidade_id'))
            <span class"help-block">
                <strong>{{$errors->first('modalidade_id')}}</strong>
            </span>
        @endif
    </div>     
</div>   