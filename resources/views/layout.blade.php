</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>DompetKu - @yield('title')</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">DompetKu</a>

            @auth
            <div class="ms-auto">
                <a href="{{ route('income.index') }}" class="btn btn-light btn-sm">Income</a>
                <a href="{{ route('expenses.index') }}" class="btn btn-light btn-sm">Expenses</a>

                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
            @endauth

            @guest
            <div class="ms-auto">
                <a href="/login" class="btn btn-light btn-sm">Login</a>
            </div>
            @endguest
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
@yield('script')
</html>
