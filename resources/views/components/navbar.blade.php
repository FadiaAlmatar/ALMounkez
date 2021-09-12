<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#" style="color: #eb640a">Welcome @auth {{Auth::User()->name}} @endauth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {{-- <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="/" style="color: #eb640a">Home</a>
          </li> --}}
          {{-- <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{route('messages.create')}}" style="color: #eb640a">Chat</a>
          </li> --}}
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}" style="color: #eb640a">posts</a>
          </li>
          {{-- <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{route('comments.index')}}" style="color: #eb640a">comments</a>
          </li> --}}
          @auth
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{route('posts.create')}}" style="color: #eb640a">Create post</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page"   href="{{route('messages.create')}}"  style="color: #eb640a">
              chat
            </a>
            </li> @endauth
            {{-- <li class="nav-item">
                <a class="nav-link active" href="{{ route('locale.toggle', App::getLocale() == 'ar' ? 'en': 'ar') }}" style="color:#eb640a">{{ App::getLocale() == 'ar' ? 'EN' : 'AR' }}</a>
            </li> --}}

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
                  {{ __('lang') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/locale/ar" style="color: orange">{{ __('Ar') }}</a></li>
                  <li><a class="dropdown-item" href="/locale/en" style="color: orange">{{ __('En') }}</a></li>
                </ul>
              </li>

          {{-- <li class="nav-item"> --}}
            {{-- <a class="nav-link active" href="{{route('home')}}" style="color: #eb640a">Posts</a> --}}
          {{-- </li> --}}
          {{-- @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #eb640a">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="{{route('login')}}"style="color: #eb640a">Log in</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}" style="color: #eb640a">Sign in</a></li> --}}
              {{-- @endguest
              @auth --}}
              {{-- <li><a class="dropdown-item" href="{{route('logout')}}" style="color: #eb640a">Log out</a></li> --}}

              {{-- <div class="navbar-item">
                Hi {{ Auth::user()->name }}!!
              </div> --}}
            {{-- </ul> --}}
            {{-- </li> --}}

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
              {{ __('account') }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @guest<li><a class="dropdown-item" href="{{ asset('login') }}" style="color: orange">{{ __('Login') }}</a></li>
              <li><a class="dropdown-item" href="{{ asset('register') }}" style="color: orange">{{ __('register') }}</a></li>@endguest
              <li><hr class="dropdown-divider"></li>
              @auth
              <li><form action="logout" method="post">
                @csrf
                <input type="submit" class="button is-light" value="{{ __('Logout') }}">
              </form></li>@endauth
            </ul>
          </li>
            {{-- @endguest --}}
              {{-- @auth
              <li><form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="button is-dark" style="color: #eb640a;background:none;align:center" value="Logout">
              </form></li>
              @endauth --}}
        </ul>
        <form class="d-flex">
          <input id="search"class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-color:#eb640a">
          <button  type="submit" class="button is-dark" style="color: #eb640a;align:center">Search</button>
        </form>
      </div>
    </div>
  </nav>
