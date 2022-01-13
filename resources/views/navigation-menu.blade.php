<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('theme/images/logo_custom.png')}}" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu" >
            <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')" class="nav-link"  href="{{ route('index') }}">Home</x-jet-nav-link>
                </li>
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('all_houses') }}" :active="request()->routeIs('all_houses')" class="nav-link" href="{{ route('all_houses') }}">All houses</x-jet-nav-link>
                </li>
                @role('editor')
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('my_houses') }}" :active="request()->routeIs('my_houses')" class="nav-link" href="{{ route('my_houses') }}">My houses</x-jet-nav-link>
                </li>
                @endrole
                @role('admin')
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('populated_places') }}" :active="request()->routeIs('populated_places')" class="nav-link" href="{{ route('populated_places') }}">Populated places</x-jet-nav-link>
                </li>
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('object_types') }}" :active="request()->routeIs('object_types')" class="nav-link" href="{{ route('object_types') }}">Object types</x-jet-nav-link>
                </li>
                <li class="nav-item" style="margin-left: 0.5em; margin-right: 0.5em">
                    <x-jet-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')" class="nav-link" href="{{ route('roles') }}">Users</x-jet-nav-link>
                </li>
                @endrole
            </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Start Atribute Navigation -->
        <div class="attr-nav" style="padding-left: 15em">
            <ul>
                @if(auth()->user())
                <li class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><x-jet-dropdown-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Profile</x-jet-dropdown-link></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li>
                                <x-jet-dropdown-link id="logout" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </li>
                        </form>
                    </ul>
                <li class="nav-item"></li>
                @else
                    <li class="nav-item">
                        <x-jet-nav-link href="/register" class="nav-link">Register</x-jet-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-jet-nav-link href="/login" class="nav-link">Login</x-jet-nav-link>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Atribute Navigation -->
    </div>
</nav>
