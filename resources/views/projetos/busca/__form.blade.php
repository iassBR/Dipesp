{{ csrf_field() }}
{{--  
@section('style')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('public/js/select2.full.min.js') }}"></script>
@endsection

@section('document-ready')
//Initialize Select2 Elements
$('.select2').select2();
@endsection  --}}

<div class="form-group">
    <div class="form-group col-md-6 ">
        <label for="título">Título</label>
        <input class="form-control" type="text" placeholder="Título" name="titulo"  value="{{ old('titulo') }}">
       
    </div>

   

    <div class="form-group col-md-6 ">
        <label for="orientador">Orientador</label>  
        <select id="orientadores" class="form-control" name="orientador" >
            <option value="" >Selecione</option>
            @foreach($orientadores as $orientador)            
                <option value="{{$orientador->id}}" 
                {{(isset($orientador->id) && $orientador->id == old('orientador') ? 
                'selected' : '')}}>
                {{$orientador->nome}}
                </option>
            @endforeach
        </select>
      
    </div> 
        

    <div class="form-group col-md-6 ">
        <label for="aluno">Aluno</label> 
        <select id="alunos" class="form-control" name="aluno" >
        <option value="" >Selecione</option>
        @foreach($alunos as $aluno)            
            <option value="{{$aluno->id}}" 
            {{(isset($aluno->id) && $aluno->id == old('aluno') ? 
            'selected' : '')}}>
            {{$aluno->nome}}
            </option>
        @endforeach
        </select>
       
    </div>     

    <div class="form-group col-md-6 ">
        <label for="area_pesquisa">Área de pesquisa</label>
        <select class="form-control" name="area_pesquisa" id="area_pesquisa" >
        <option value="" >Selecione</option>
        @foreach($areaPesquisas as $areaPesquisa)            
            <option value="{{$areaPesquisa->id}}" 
            {{(isset($areaPesquisa->id) && $areaPesquisa->id == old('area_pesquisa') ? 
            'selected' : '')}}>
            {{$areaPesquisa->descricao}}
            </option>
        @endforeach
        </select>
      
    </div>

    <div class="form-group col-md-6 ">
        <label for="curso">Curso</label>
        <select class="form-control" name="curso" id="curso" >
        <option value="" >Selecione</option>
        @foreach($cursos as $curso)            
            <option value="{{$curso->id}}"
            {{ (isset($curso->id) && $curso->id == old('curso') ? 'selected' : '' ) }}
            >
            {{$curso->nome}} 
            </option>
        @endforeach
        </select>        
    </div>
   
    <div class="form-group col-md-6 ">
        <label for="publicado em">Ano de publicação</label>
        
        <div class="input-group">
            <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
            </div>
            <select class="form-control" style="width: auto;" tabindex="-1" aria-hidden="true" name="ano_publicacao" id="ano_publicacao">
            <option value="">Selecione</option>
            @foreach(range(date('Y'), 2000) as $year))
                <option value="{{$year}}"
                {{ (isset($year) && $year == old('ano_publicacao') ? 'selected' : '' ) }} >
                {{ $year }}
                </option>
            @endforeach
            </select>
        </div>            
    </div>   

    <div class="form-group col-md-6 ">
        <label>Publicado entre</label>        
            <div class="input-group  input-daterange">
                 <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>                
                    <select class="form-control" style="width: auto;" tabindex="-1" aria-hidden="true" name="ano_inicio" id="ano_inicio">
                        <option value="">Selecione</option>
                        @foreach(range(date('Y'), 2000) as $anoInicio))
                            <option value="{{$anoInicio}}"
                            {{ (isset($anoInicio) && $anoInicio == old('ano_inicio') ? 'selected' : '' ) }} >
                            {{ $anoInicio }}
                            </option>
                        @endforeach
                    </select>
                
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                    <select class="form-control" style="width: auto;" tabindex="-1" aria-hidden="true" name="ano_fim" id="ano_fim">
                        <option value="">Selecione</option>
                        @foreach(range(date('Y'), 2000) as $anoFim))
                            <option value="{{$anoFim}}"
                            {{ (isset($anoFim) && $anoFim == old('ano_fim') ? 'selected' : '' ) }} >
                            {{ $anoFim }}
                            </option>
                        @endforeach
                    </select>    
            </div>   
    </div>