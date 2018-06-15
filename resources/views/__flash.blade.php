        @if (Session::has('success'))

            <div id="sucesso" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sucesso</h4>
                <h5>{{ Session::get('success') }}</h5>
            </div>
            
        @endif
        @if (Session::has('error'))
            <div id="erro" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                <h5>{{ Session::get('error') }}</h5>
            </div>

                  
        @endif