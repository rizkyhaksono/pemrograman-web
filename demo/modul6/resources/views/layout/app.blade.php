<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <nav>
            <a href="{{ route('documentation') }}" class="navbar-link">API Documentation</a>
            <a href="https://github.com/rizkyhaksono" target="blank" class="navbar-link">Postman Documentation</a>
        </nav>
        <a href="https://github.com/rizkyhaksono" target="blank"
            style="color: antiquewhite; display: inline-block; padding-top: 20px">by Rizky Haksono</a>

    </header>

    <div class="content-container">
        @yield('content')
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
