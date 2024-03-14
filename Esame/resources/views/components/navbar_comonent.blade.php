<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Progetto Laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnav" aria-controls="navbarnav" aria-expanded="false" aria-label="toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarnav">
      <ul class="navbar-nav">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
        @endauth
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">registrazione</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
