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

            <div class="ms-auto d-flex align-items-center gap-2">

                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item dropdown">
                        <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Language
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/lang/en">English</a></li>
                            <li><a class="dropdown-item" href="/lang/id">Bahasa Indonesia</a></li>
                        </ul>
                    </li>
                </ul>

                @auth
                    <a href="{{ route('income.index') }}" class="btn btn-light btn-sm">{{__('messages.income')}}</a>
                    <a href="{{ route('expenses.index') }}" class="btn btn-light btn-sm">{{__('messages.expenses')}}</a>

                    <form action="/logout" method="POST" class="d-inline d-flex align-items-center">
                        @csrf
                        <button class="btn btn-danger btn-sm">{{__('messages.logout')}}</button>
                    </form>
                @endauth

                @guest
                    <a href="/login" class="btn btn-light btn-sm">{{ __('messages.login') }}</a>
                    <a href="/register" class="btn btn-light btn-sm">{{ __('messages.register') }}</a>
                @endguest
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('script')
</html>
