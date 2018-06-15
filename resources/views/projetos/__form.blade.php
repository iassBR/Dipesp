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
    <div class="form-group col-md-6 {{ $errors->has('titulo') ? ' has-error' : ''}}">
        <label for="título">Título</label>
        <input class="form-control" type="text" placeholder="Título" name="titulo" required value="{{ isset($projeto->titulo) && empty(old('titulo'))? $projeto->titulo : old('titulo') }}">
        @if($errors->has('titulo'))
            <span class="help-block">{{ $errors->first('titulo') }}</span></span>
        @endif
    </div>

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('ano_publicacao') ? ' has-error' : ''}}">
                <label for="publicado em">Ano de publicação</label>
                
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <select class="form-control" style="width: auto;" tabindex="-1" aria-hidden="true" name="ano_publicacao" id="ano_publicacao">
                    @foreach(range(date('Y'), 2000) as $year))
                        <option value="{{$year}}" 
                        {{(isset($projeto->ano_publicacao) && $projeto->ano_publicacao == $year ?
                        'selected' : '')}}>{{ $year }}
                        </option>
                    @endforeach
                    </select>
                </div>
                @if($errors->has('titulo'))
                    <span class="help-block">{{ $errors->first('ano_publicacao') }}</span></span>
                @endif
            </div>
    </div>   

    <div class="form-group col-md-6 {{ $errors->has('orientador') ? ' has-error' : ''}}">
        <label for="orientador">Orientador</label>  <a class="add-orientador btn btn-success btn-xs">  <i class="fa fa-plus"></i> Novo Orientador </a>
        <select id="orientadores" class="form-control" name="orientador" required>
            @foreach($orientadores as $orientador)            
                <option value="{{$orientador->id}}" 
                {{(isset($projeto->orientador_id) && $projeto->orientador_id == $orientador->id ? 
                'selected' : '')}}>{{$orientador->nome}}
                </option>
            @endforeach
        </select>
        @if($errors->has('titulo'))
            <span class="help-block">{{ $errors->first('orientador') }}</span></span>
        @endif
    </div> 
        

    <div class="form-group col-md-6 {{ $errors->has('aluno') ? ' has-error' : ''}}">
        <label for="aluno">Aluno</label> <a class="add-aluno btn btn-success btn-xs">  <i class="fa fa-plus"></i> Novo Aluno </a>
        <select id="alunos" class="form-control" name="aluno" required>
        @foreach($alunos as $aluno)            
            <option value="{{$aluno->id}}" 
            {{(isset($projeto->aluno) && $projeto->aluno == $aluno ? 
            'selected' : '')}}>{{$aluno->nome}}
            </option>
        @endforeach
        </select>
        @if($errors->has('titulo'))
            <span class="help-block">{{ $errors->first('aluno') }}</span></span>
        @endif
    </div>     

    <div class="form-group col-md-6 {{ $errors->has('area_pesquisa') ? ' has-error' : ''}}">
        <label for="area_pesquisa">Área de pesquisa</label>
        <select class="form-control" name="area_pesquisa" id="area_pesquisa" required>
        @foreach($areaPesquisas as $areaPesquisa)            
            <option value="{{$areaPesquisa->id}}" 
            {{(isset($projeto->area_pesquisa) && $projeto->area_pesquisa == $areaPesquisa ? 
            'selected' : '')}}>{{$areaPesquisa->descricao}}
            </option>
        @endforeach
        </select>
        @if($errors->has('titulo'))
            <span class="help-block">{{ $errors->first('area_pesquisa') }}</span></span>
        @endif
    </div>

    @if(isset($projeto->arquivo) && $projeto->Arquivo !== null)
        <div class="form-group col-md-3 {{ $errors->has('project_file') ? ' has-error' : ''}}">
            <label for="project file">Anexo</label> <br>
            
            <a href="{{ route('projetos.displayFile', $projeto->arquivo) }}" title="visualizar anexo">
                <button type="button" class="btn btn-default">
                    <i class="fa fa-2x fa-file"></i>
                </button>
            </a>
       
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-2x fa-edit"></i>
                </button>
        </div>

        {{--  file modal  --}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Atualizar anexo</h4>
            </div>
            <div class="modal-body">
                <span class="{{ $errors->has('project_file') ? ' has-error' : ''}}">
                    <label for="project file">Anexar projeto (somente: PDF)</label> <br>
                    <input type="file" name="project_file" id="project_file" accept="application/pdf"/>
                    @if($errors->has('project_file'))
                        <span class="help-block">{{ $errors->first('project_file') }}</span></span>
                    @endif
                <span>
            </div>
            <div class="modal-footer">
                <button type="reset" onClick="this.form.project_file.value=''" class="btn btn-danger">manter anexo anterior</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">confirmar</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        {{--  /file modal  --}}
    @else
        <!-- file field -->
        <div class="form-group col-md-3 {{ $errors->has('project_file') ? ' has-error' : ''}}">
            <label for="anexar projeto">Fazer upload do projeto (.PDF)</label> <br>
            <input type="file" name="project_file" id="project_file" required accept="application/pdf"/>
            </select>
            @if($errors->has('titulo'))
                <span class="help-block">{{ $errors->first('project_file') }}</span></span>
            @endif
        </div>
    @endif
    <!-- /. pfile field -->