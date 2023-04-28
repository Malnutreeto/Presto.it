@vite(['resources/css/navbar.css', 'resources/js/navbar.js', 'resources/js/canvas.js'])
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-12 d-flex justify-content-end align-items-center me-2 mt-2">
            <div class="btn-group dropstart m-1">
                <button type="button" class="btn btn-secondary dropdown-toggle lang-btn" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-{{ app()->getLocale() === 'en' ? 'gb' : app()->getLocale() }}"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <x-_locale lang="en" nation="gb" />
                    </li>
                    <li>
                        <x-_locale lang="it" nation="it" />
                    </li>
                </ul>
            </div>
            <div class="">
                @auth
                <button class="btn userbtn dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1 p-0"></i>{{ auth()->user()->nickname }}</i>
                    @if (auth()->user()->role_id < 3)
                        @if (count($products) !==0 && count($tickets) !== 0 )
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            +{{count($products)}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                            @elseif(count($tickets) !== 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            +{{count($tickets)}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                            @elseif(count($products) !== 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            +{{count($products)}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        @endif
                    @elseif (auth()->user()->role_id === 3 && count($tickets) !== 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        +{{count($products)}}
                        <span class="visually-hidden">unread messages</span>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <form class="dropdown-item" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn w-100 text-light text-start p-0 m-0">
                              Logout
                            </button>
                        </form>
                    </li>
                    @if(auth()->user()->role_id < 4)
                        <li><a class="dropdown-item" href="{{route('admin')}}">{{ __('ui.panel') }}</a></li>
                    @endif
                </ul>
                @else
                    <a href="/login" class="text-decoration-none" style="color:black"><i class="bi bi-person-circle"></i> {{ __('ui.area') }}</a>
                @endauth
            </div>
        </div>
    </div>
</div>
<div id="navbar" class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div id="nav-logo" class="nav-logo">
            <a href="/"><img src="{{ asset('site_img/solobusta.png') }}" alt="" width="50"
                    height="40"></a>
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <button class="btn ins-prod-btn">
            <a class="text-decoration-none" href="{{ route('product.create') }}">{{ __('ui.announcement') }}</a>
            </button>
        <!-- <a href="{{ route('category.index') }}">{{ __('ui.category') }}</a> -->
        <a href="{{ route('product.index') }}">{{ __('ui.product') }}</a>
        
    </div>
</div>
