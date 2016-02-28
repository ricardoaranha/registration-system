<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::to('/') }}">Início</a></li>
        <li><a href="{{ URL::to('/seletivos') }}">Seletivos</a></li>
        <li><a href="{{ URL::to('/cargos') }}">Cargos</a></li>
      </ul>
    </div>
  </div>
</nav>
