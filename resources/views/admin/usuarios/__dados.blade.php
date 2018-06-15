<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-6"> 
        <input name="name" type="text" class="form-control" id="name" placeholder="Informe o nome aqui" value="{{isset($usuario)  ? $usuario->name  : old('name')}}">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6"> 
        <input name="email" type="text" class="form-control" id="email" placeholder="Informe o email aqui" value="{{isset($usuario)  ? $usuario->email  : old('email')}}">
            @if($errors->has('email'))
                <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
            @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-sm-2 control-label">Senha</label>

    <div class="col-sm-6">
        <input id="password" type="password" placeholder="Informe a senha aqui" class="form-control" name="password" >

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-sm-2 control-label">Confirmação de senha</label>

    <div class="col-sm-6">
        <input id="password-confirm" type="password" placeholder="Repita a senha aqui" class="form-control" name="password_confirmation" >
    </div>
</div>