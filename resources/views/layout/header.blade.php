<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
      <img src="{{ url('assets/images/logo_real.png') }}" alt="logo" /> </a>
    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
      <img src="{{ url('assets/images/logo-mini.svg') }}" alt="logo" /> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    @include('components.unitaudit-state')
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">
            @if(isset($current_authenticated_user))
                {{ $current_authenticated_user->nama }}
            @else
                You are logged out
            @endif
          </span>
              <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face8.jpg') }}" alt="Profile image">
              </a>
                @auth
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                      <form action="/logout" method="post">
                          @csrf
                          <button class="dropdown-item">Log Out</button>
                      </form>
                  </div>
                @endauth
      </li>
  </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu icon-menu"></span>
    </button>

  </div>
</nav>
