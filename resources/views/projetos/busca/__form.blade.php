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
                {{(isset($projeto->orientador_id) && $projeto->orientador_id == $orientador->id ? 
                'selected' : '')}}>{{$orientador->nome}}
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
            {{(isset($projeto->aluno) && $projeto->aluno == $aluno ? 
            'selected' : '')}}>{{$aluno->nome}}
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
            {{(isset($projeto->area_pesquisa) && $projeto->area_pesquisa == $areaPesquisa ? 
            'selected' : '')}}>{{$areaPesquisa->descricao}}
            </option>
        @endforeach
        </select>
      
    </div>

    <div class="form-group col-md-6 ">
        <label for="curso">Curso</label>
        <select class="form-control" name="curso" id="curso" >
        <option value="" >Selecione</option>
        @foreach($cursos as $curso)            
            <option value="{{$curso->id}}">
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
                <option value="{{$year}}">
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
                        @foreach(range(date('Y'), 2000) as $year))
                            <option value="{{$year}}">
                            {{ $year }}
                            </option>
                        @endforeach
                    </select>
                
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                    <select class="form-control" style="width: auto;" tabindex="-1" aria-hidden="true" name="ano_fim" id="ano_fim">
                        <option value="">Selecione</option>
                        @foreach(range(date('Y'), 2000) as $year))
                            <option value="{{$year}}">
                            {{ $year }}
                            </option>
                        @endforeach
                    </select>    
            </div>   
    </div>