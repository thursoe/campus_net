<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Net</title>
    <!-- Bootstrap CSS CDN & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm">
        <div class="container-fluid">
            <a href="{{ route('posts.index') }}" class="navbar-brand ms-3 text-primary h1 fw-bold">Campus Net</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content"
                aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-muted" id="navbar-content">
                <ul class="navbar-nav ms-auto">
                    @if (Auth::user())
                        <li class="nav-item mx-1">
                            <a href="{{ url(sprintf('users/%d', Auth::user()->id)) }}"
                                class="nav-link"><small>Profile</small></a>
                        </li>
                        <li class="nav-item mx-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item mx-1">
                            <a href="{{ url('login') }}" class="nav-link"><small>Login</small></a>
                        </li>
                        <li class="nav-item mx-1">
                            <a href="{{ url('register') }}" class="nav-link"><small>Signup</small></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>
