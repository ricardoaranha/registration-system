<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::to('/') }}">Início</a></li>
        @if(Session::has('user'))
        <li><a href="{{ URL::to('/seletivos') }}">Seletivos</a></li>
        <li><a href="{{ URL::to('/cargos') }}">Cargos</a></li>
        <li><a href="{{ URL::to('/inscritos') }}">Inscritos</a></li>
        <li><a href="{{ URL::to('/login/usuarios') }}">Usuários</a></li>
        <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="{{ URL::to('/relatorios/seletivos') }}">Seletivos</a></li>
             <li><a href="{{ URL::to('/relatorios/cargos') }}">Cargos</a></li>
             <li><a href="{{ URL::to('/relatorios/inscritos') }}">Inscritos</a></li>
          </ul>
        </li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
         @if(Session::has('user'))
         <li><a>{{ Session::get('user')['nome'] }}</a></li>
         <li><a href="{{ URL::to('/logout') }}">Logout <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
         @else
         <li><a href="{{ URL::to('/login') }}">Login</a></li>
         @endif
      </ul>
    </div>
  </div>
</nav>
