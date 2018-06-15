<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">

			{{--  General menu  --}}
			<li class="header">GERAL</li>
			<li><a href="{{ route('home') }}"><i class="fa fa-home text-green"></i> <span>Home</span></a></li>
			
			@can('lista-orientadores')
			<li><a href="{{route('orientadores.index')}}"><i class="fa fa-users  text-green"></i> <span>Orientadores</span></a> </li>
			@endcan

			@can('lista-alunos')
			<li><a href="{{route('alunos.index')}}"><i class="fa fa-users text-green"></i> <span>Alunos</span></a> </li>
			@endcan

			@can('lista-cursos')
			<li><a href="{{route('cursos.index')}}"><i class="fa  fa-book text-green"></i> <span>Cursos</span></a> </li>
			@endcan

			{{-- Projetos menu --}}
			@can('lista-projetos')
			<li class="header">PROJETOS</li>
			<li><a href="{{route('projetos.index')}}"><i class="fa fa-th-list text-green"></i> <span>Projetos</span></a> </li>
			<!-- <li><a href=""><i class="fa  fa-search text-green"></i> <span>Busca Avançada</span></a> </li> -->
			@endcan

			{{--  Users menu  --}}
			@can('lista-usuarios')
			<li class="header">USUÁRIOS</li>
			<li><a href="{{ route('usuarios.index') }}"> <i class="fa fa-user-circle-o text-green"></i> <span>Usuários</span></a></li>
			@endcan
			@can('lista-papeis')	

			{{--  Users menu  --}}
			<li class="header">PERMISSÕES DO SISTEMA</li>
			<li><a href="{{ route('papeis.index') }}"><i class="fa fa-sitemap text-green"></i> <span>Papéis</span></a></li>
			@endcan
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>