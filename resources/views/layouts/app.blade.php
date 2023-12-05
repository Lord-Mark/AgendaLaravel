<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin-bottom: 10px">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{route('contacts.index')}}">
            <box-icon name='contact' type='solid' color='#e7e7e7'></box-icon>
            <span class="ms-2">Agenda</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('contacts')) active @endif" aria-current="page"
                       href="{{route('contacts.index')}}">Contatos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('contacts/create')) active @endif"
                       href="{{route('contacts.create')}}">Criar</a>
                </li>
            </ul>
            <!-- Formulário de Busca -->
            <form method="get" action="{{route('contacts.search')}}" class="form-inline mx-auto" >
                <div class="input-group">
                    <input class="form-control" name="search" type="search" placeholder="Pesquisar" aria-label="Buscar contato">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            @auth()
                <div class="my2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->name}}
                                <box-icon name='user-circle' type='solid' color='#e7e7e7' ></box-icon>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item">Perfil</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Sair</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
