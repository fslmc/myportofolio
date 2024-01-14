<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS and JS files here --><link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>My Portfolio</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">My Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.list') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light py-3">
        <div class="container text-center">
            <p>&copy; 2023 My Portfolio. All rights reserved.</p>
        </div>
    </footer>

    <!-- Add your JS files here -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>