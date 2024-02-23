<nav class="navbar navbar-expand-lg shadow sticky-top">
    <div class="container-fluid">
        <div class="logo_custom navbar-brand">
            <a class="fs-1 welcome-page-elements" href="/">
                <img class="img-fluid d-none d-lg-block ms-2 " src="/img/QuickTradeLogo.png" alt="">
                <img class="img-fluid d-block  d-lg-none " src="/img/logoMobile.png" alt="">
            </a>
        </div>
        {{-- fine logo --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('announcements.index') }}"
                        class="navbuttons btn btn-outline-success me-2 mb-2 mb-md-0"
                        aria-current="page">{{ __('ui.announcementsNavbar') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="navbuttons btn dropdown-toggle" id="categoriesDropdown" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{ __('ui.categoriesNavbar') }}</button>
                    <ul class="dropdown-menu dropdown-color" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                <input type="search" name="searched" class="form-control me-1"
                    placeholder="{{ __('ui.placeholderNavbar') }}" aria-label="Search">
                <button class="btn btn-outline-succes links" type="submit"><i class="bi bi-search fs-4"></i></button>
            </form>
            <ul class="navbar-nav  ">
                <nav class="navbar">
                    <form class="container-fluid justify-content-start">

                        @guest
                            <button class="btn btn-sm btn-outline-success me-2 navbuttons" type="button"><a
                                    id="links-navbar"
                                    href="{{ route('register') }}">{{ __('ui.registerNavbar') }}</a></button>
                            <button class="btn btn-sm btn-outline-success me-2 navbuttons" type="button"><a
                                    id="links-navbar" href="{{ route('login') }}">{{ __('ui.accessNavbar') }}</a></button>
                        @else
                            <a class="navbuttons btn btn-outline-success mx-2"
                                href="{{ route('announcements.create') }}">{{ __('ui.putAnnouncementNavbar') }}</a>
                            @if (Auth::user()->is_revisor)
                                <a class="navbuttons btn btn-outline-success position-relative me-4"
                                    href="{{ route('revisor.index') }}"> {{ __('ui.revZoneNavbar') }}
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">unread messagges</span>
                                    </span>
                                </a>
                            @endif
                            @auth

                                <p class="mb-0 me-3 text-light">
                                    {{ __('ui.welcomeAuthorMessage') }} <i>{{ Auth::user()->name }}</i>
                                </p>

                            @endauth
                            <button class="btn btn-outline-danger navbuttons mx-2 mt-2 mt-lg-0" type="button"><a id="links-navbar"
                                    href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.logoutNavbar') }}</a></button>
                        @endguest
                    </form>
                    <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf</form>
                </nav>
            </ul>
        </div>
    </div>
</nav>
