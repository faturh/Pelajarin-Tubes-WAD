<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            height: 100vh;
        }
        .sidebar .nav-link {
            font-weight: bold;
            color: #333;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
        }
    </style>
    @stack('styles') <!-- Tambahkan jika ada style tambahan di halaman -->
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar d-md-block bg-light">
                <h4 class="text-center py-3">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.elearning.index') }}">E-Learning</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data-User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Job-Seeker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 content">
                @yield('content2')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- Tambahkan jika ada script tambahan di halaman -->
</body>
</html>
