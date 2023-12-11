<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API Documentation</title>
    <link rel="stylesheet" href="{{ asset('css/documentation.css') }}">
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="{{ route('documentation') }}">API Documentation</a>
            </li>
        </ul>
    </nav>

    <div>@yield('content')</div>
</body>

</html>
