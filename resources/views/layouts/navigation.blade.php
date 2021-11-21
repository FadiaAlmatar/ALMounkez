<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
                {{-- <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}" >{{__('posts')}}</a> --}}
                <a style="color:blue"class="nav-link active" aria-current="page" href="{{route('posts.create')}}" >{{__('Create post')}}</a>
                <a class="nav-link active" aria-current="page"   href="{{route('messages.create')}}" >{{__('chat')}}</a>
                <a class="nav-link active" aria-current="page"   href="{{route('orders.create')}}" > {{__('Order')}}</a>
                <div class="dropdown">
                    <button style="background:white"type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                        {{ __('Orders') }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('fullorders.create_local')}}" >{{ __('Request a local membership document') }}</a>
                        <a class="dropdown-item" href="{{route('fullorders.create_external')}}" >{{ __('Request an external membership document') }}</a>
                        <a class="dropdown-item" href="{{route('fullorders.create_transfer')}}" >{{ __('Membership transfer form from one branch to another') }}</a>
                        <a class="dropdown-item" href="{{route('fullorders.create_replacement')}}" >{{ __('Request for a replacement membership card') }}</a>
                        @if(Auth::User()->role == "user")
                        <a class="dropdown-item" href="{{route('fullorders.index')}}" >{{ __('My Orders') }}</a>
                        @else
                        <a class="dropdown-item" href="{{route('fullorders.index')}}" >{{ __('all Orders') }}</a>
                        @endif
                    </div>
                </div>
                <div class="dropdown">
                    <button style="background:white"type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                        {{__('lang')}}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{asset('/locale/ar')}}">{{ __('Ar') }}</a>
                        <a class="dropdown-item" href="{{asset('/locale/en')}}">{{ __('En') }}</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button style="background:white"type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                        {{ __('account') }}
                    </button>
                    <div class="dropdown-menu">
                        @guest<a class="dropdown-item" href="{{ asset('login') }}" style="color: blue">{{ __('Login') }}</a>
                     <a class="dropdown-item" href="{{ asset('register') }}" style="color: blue">{{ __('register') }}</a>@endguest
                     @auth
                     <a class="nav-link"><form action="logout" method="post">
                       @csrf
                       <input type="submit" style="background-color: white;" value="{{ __('Log Out') }}">
                     </form>
                    </a>@endauth
                    </div>
                </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
