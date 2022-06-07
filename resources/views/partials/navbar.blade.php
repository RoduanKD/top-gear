<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">TOPGEAR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('locale.update', App::isLocale('en') ? 'ar' : 'en') }}">{{ App::isLocale('en') ? 'Arabic' : 'English' }}</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('cars.index') }}" method="GET">
                <input type="hidden" name="category" value="{{ request()->category }}">
                <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search"
                value="{{ request()->q }}" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            @auth
                <div class="nav-item px-3">
                    Hello {{ auth()->user()->name }}
                </div>
                <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            @endauth

            @guest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
@push('css')
<style>
    .navbar {
        background-color: #011f9e;
    }

</style>
@endpush
