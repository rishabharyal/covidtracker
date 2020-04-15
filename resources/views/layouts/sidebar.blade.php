<nav class="navbar navbar-vertical fixed-left navbar-expand-lg navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        {{-- @if($school && $school->getMedia('default')->first())
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <img src="{{ $school->getMedia('default')->first()->getUrl() }}" class="navbar-brand-img" alt="...">
        <p class="display-5 pt-2"><strong> {{$school->name ?? ''}}</strong></p>
        </a>
        @endif --}}
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            {{-- @if($school && $school->getMedia('default')->first())
                            <a class="navbar-brand pt-0" href="{{ route('home') }}">
                            <img src="{{ $school->getMedia('default')->first()->getUrl() }}" class="navbar-brand-img"
                                alt="...">
                        </a>
                        @endif --}}
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) === 'infected-places' ? 'active' : '' }}"
                        href="{{action('InfectedPlaceController@index')}}">
                        <i class="ni ni-chart-bar-32 text-blue"></i>
                        <span>Infected Places</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>