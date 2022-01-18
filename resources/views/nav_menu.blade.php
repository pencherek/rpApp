<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">Home</a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Rps</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="{{route('rolePlays.index')}}">Mes parties</a>
          <a class="navbar-item">Toutes les parties</a>
          <a class="navbar-item">Créer</a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Characters</a>
        <div class="navbar-dropdown">
          <a class="navbar-item">Mes characters</a>
          <hr class="navbar-divider">
          <a class="navbar-item">Rien</a>
        </div>
      </div>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        @if(auth()->check())
          <div class="buttons">
            <a class="button is-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
          </div>
          <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        @else
          <div class="buttons">
            <a class="button is-primary"><strong>Sign up</strong></a>
            <a class="button is-light">Log in</a>
          </div>
        @endif
      </div>
    </div>
  </div>
</nav>