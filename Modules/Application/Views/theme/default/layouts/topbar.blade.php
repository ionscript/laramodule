<nav class="navbar navbar-expand-lg navigation fixed-top sticky">
    <div class="container">
        <a class="navbar-logo" href="{{route('app.home')}}">
            <span class="h4 text-primary logo logo-dark"><i class="bx bx-analyse text-primary"></i> <span class="text-dark">Frontoffice</span></span>
            <span class="h4 text-primary logo logo-light"><i class="bx bx-analyse text-primary"></i> <span class="text-white">Frontoffice</span></span>
        </a>

        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav ml-auto" id="topnav-menu" >
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                @foreach($pages['top'] as $page)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.page', ['id' => $page->id]) }}">{{ $page->title }}</a>
                </li>
                @endforeach
            </ul>

            <div class="ml-lg-2">
                <a href="{{ route('account.register') }}" class="btn btn-link text-success waves-effect">Register</a>
                <a href="{{ route('account.login') }}" class="btn btn-outline-success w-xs">Login</a>
            </div>
        </div>
    </div>
</nav>
