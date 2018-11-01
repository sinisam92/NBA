<header class="masthead mb-auto" style="color:brown">
    <div class="inner">
      <h3 class="masthead-brand">NBA 2018</h3>
      <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="/">Home Page</a>
            <a class="nav-link" href="/news/create">Create News</a>
            <a class="nav-link" href="/news">News</a>

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