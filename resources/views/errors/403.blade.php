@extends('layouts.adminlte')

@section('title', 'Não autorizado!')
@section('subtitle', '')

@section('content')


<div class="error-page">
  <h2 class="headline text-yellow"> 403</h2>

  <div class="error-content">
    <h3><i class="fa fa-warning text-yellow"></i> Você não tem permissão para isso!</h3>

    <p>
      Você não possui permissão para realizar esta ação, por favor contate o administrador.
        <a href="{{ url()->previous() }}">Voltar</a> 
    </p>

    
  </div>
  <!-- /.error-content -->
</div>

@stop