<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::to('/') }}">Início</a></li>
        <li><a href="{{ URL::to('/seletivos') }}">Seletivos</a></li>
        <li><a href="{{ URL::to('/cargos') }}">Cargos</a></li>
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
