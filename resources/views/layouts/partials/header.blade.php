<header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">NBA 2018</h3>
      <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="/">All Teams</a>

        @if(auth()->check())
            Hello, {{ auth()->user()->name }}.
            <a class="nav-link" href="/logout">Logout</a>
        @else 
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
        @endif
        
        
        
      </nav>
    </div>
  </header>