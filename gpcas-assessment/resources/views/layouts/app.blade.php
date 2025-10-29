<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    <!-- Header / Navbar -->
    <header class="main-header">
        <div class="container header-container">
            <h1 class="logo color-white">Event Management</h1>
            <nav class="nav">
                <!-- <a href="{{ route('home') }}">Home</a> -->
                <a href="{{ route('events.index') }}">Home</a>
                <a href="{{ route('events.create') }}">Add Event</a>
                <!-- <a href="{{ route('events.create') }}" class="btn-add"></a> -->
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="container main-content">
        <div class="card">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        &copy; {{ date('Y') }} My App. All rights reserved.
    </footer>

    <!-- Optional: Modals -->
    @yield('modals')
</body>

</html>