<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #eb640a">{{__('Welcome')}} @auth {{Auth::User()->name}} @endauth</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item ">
                     <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}" style="color: #eb640a">{{__('posts')}}</a>
                 </li>
                 @auth
                 <li class="nav-item ">
                     <a class="nav-link active" aria-current="page" href="{{route('posts.create')}}" style="color: #eb640a">{{__('Create post')}}</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page"   href="{{route('messages.create')}}"  style="color: #eb640a">
                       {{__('chat')}}
                     </a>
                 </li> @endauth
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page"   href="{{route('orders.create')}}"  style="color: #eb640a">
                      {{__('Order')}}
                    </a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
                     {{ __('Orders') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                     <li><a class="dropdown-item" href="{{route('fullorders.create_local')}}" style="color: orange">{{ __('Request a local membership document') }}</a></li>
                     <li><a class="dropdown-item" href="{{route('fullorders.create_external')}}" style="color: orange">{{ __('Request an external membership document') }}</a></li>
                     <li><a class="dropdown-item" href="{{route('fullorders.create_transfer')}}" style="color: orange">{{ __('Membership transfer form from one branch to another') }}</a></li>
                     <li><a class="dropdown-item" href="{{route('fullorders.create_replacement')}}" style="color: orange">{{ __('Request for a replacement membership card') }}</a></li>

                     @if(Auth::User()->role == "user")
                        <li><a class="dropdown-item" href="{{route('fullorders.index')}}" style="color: orange">{{ __('My Orders') }}</a></li>
                    @else
                        <li><a class="dropdown-item" href="{{route('fullorders.index')}}" style="color: orange">{{ __('all Orders') }}</a></li>
                    @endif
                    </ul>
                 </li>
                 @endauth
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
                      {{ __('lang') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{asset('/locale/ar')}}" style="color: orange">{{ __('Ar') }}</a></li>
                      <li><a class="dropdown-item" href="{{asset('/locale/en')}}" style="color: orange">{{ __('En') }}</a></li>
                    </ul>
                 </li>
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
                </ul>
                <form class="d-flex">
                  <input id="search"class="form-control me-2" type="search" placeholder="{{__('search')}}" aria-label="Search" style="border-color:#eb640a">
                  <button  type="submit" class="button is-dark" style="color: #eb640a;align:center">{{__('Search')}}</button>
                </form>
              </div>
            </div>
</nav>


