<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>DompetKu - @yield('title')</title>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 2rem;
            margin-bottom: 2rem;
            overflow: hidden;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .card-hover {
            transition: all 0.3s ease;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .table th {
            background: var(--primary);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f3f4;
        }
        
        .table tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .welcome-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem;
            border-radius: 15px 15px 0 0;
            margin: -1rem -1rem 2rem -1rem;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="fas fa-wallet me-2"></i>DompetKu
            </a>

            @auth
            <div class="ms-auto d-flex align-items-center">
                <span class="text-light me-3">Welcome, {{ auth()->user()->name }}</span>
                <a href="{{ route('income.index') }}" class="btn btn-light btn-sm me-2">
                    <i class="fas fa-money-bill-wave me-1"></i>Income
                </a>
                <a href="{{ route('expenses.index') }}" class="btn btn-light btn-sm me-2">
                    <i class="fas fa-receipt me-1"></i>Expenses
                </a>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </button>
                </form>
            </div>
            @endauth

            @guest
            <div class="ms-auto">
                <a href="/login" class="btn btn-light btn-sm">
                    <i class="fas fa-sign-in-alt me-1"></i>Login
                </a>
            </div>
            @endguest
        </div>
    </nav>

    {{-- Simple fix: Only use white container for non-auth pages --}}
    @if(Request::is('login') || Request::is('register'))
        {{-- For login/register, just show the content directly on gradient background --}}
        @yield('content')
    @else
        {{-- For all other pages, use the white container --}}
        <div class="container">
            <div class="main-container">
                <div class="p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>