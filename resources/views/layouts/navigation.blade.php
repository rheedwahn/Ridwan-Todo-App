<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if(Auth::check())
        <a class="navbar-brand" href="{{ route('todo.home') }}">Todo App</a>
      @else
        <a class="navbar-brand" href="{{ route('home') }}">Todo App</a>
      @endif
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
     <ul class="nav navbar-nav">
      @if(Auth::check()) 
        <li><a href="{{ route('todo.home') }}">Home</a></li>
        <li><a href="{{ route('todo.create') }}">Create Todo</a></li>
        <li><a href="{{ route('todos') }}">All Todos</a></li> 
        <li><a href="{{ route('completed') }}">Completed Todos</a></li> 
        <li><a href="{{ route('todo.trash') }}">Trashed Todos</a></li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('user.logout') }}">Logout</a></li>
          </ul>
        </li>
      @else
        <li><a href="{{ route('register') }}">Register</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
      @endif 
     </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>