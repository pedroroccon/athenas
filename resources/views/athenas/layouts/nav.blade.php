<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#mainNavbar">
            <i class="fas fa-bars fa-fw"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('person') }}">Pessoas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category') }}">Categorias</a>
                </li>
            </ul>
        </div>
    </nav>
</header>