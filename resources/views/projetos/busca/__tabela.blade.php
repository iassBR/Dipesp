<div class="col-xs-12"> 
            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Resultado</h3>
                    <div class="box-tools pull-right"> 
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>     
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="projetos" class="table table-bordered table-striped  dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Ano de publicação</th>
                                <th>Orientador</th>
                                <th>Aluno</th>
                                <th>Área de Pesquisa</th>
                                <th>Curso</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaProjetos">
                            @if(isset($projetos))
                                @foreach($projetos as $projeto)
                                <tr>
                                    <td>{{$projeto->titulo}}</td>
                                    <td>{{$projeto->ano_publicacao}}</td>
                                    <td>{{$projeto->orientador->nome}}</td>
                                    <td>{{$projeto->aluno->nome}}</td>
                                    <td>{{$projeto->area_pesquisa->descricao}}</td>
                                    <td>{{$projeto->aluno->curso->nome}}</td>
                                    <td> 
                                        @can('editar-projetos')
                                        <a href="{{route('projetos.edit', $projeto)}}"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('deletar-projetos')
                                        <a href="{{route('projetos.remove', $projeto)}}"><i class="fa fa-minus-circle text-red"></i></a>
                                        @endcan                                    
                                        <a  target="blank" href="{{route('projetos.displayFile', $projeto->arquivo)}}"><i class="fa fa-file-pdf-o"></i></a>
                                    </td>      
                                </tr>                                    
                                @endforeach
                            @endif                            
                        </tbody>                        
                    </table>
                    <tfooter>

                    </tfooter>
                </div>
                                
                <!-- /.box-body -->
            </div>
                <!-- /.box -->
        </div>            