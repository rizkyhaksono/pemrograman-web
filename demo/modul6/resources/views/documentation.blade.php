@extends('layout.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="home-link">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#" class="home-link">API Documentation</a>
                </li>
            </ol>
        </nav>

        <h2>API Documentation</h2>

        <div class="endpoint" onclick="toggleEndpoint('signup')">
            <h3>Sign Up</h3>
            <div id="signup" class="details">
                <p>Register a new user account.</p>
                <pre>
                    <code>
                        POST /api/signup
                        Parameters:
                        - name (string)
                        - email (string)
                        - password (string)
                    </code>
                </pre>
            </div>
        </div>

        <div class="endpoint" onclick="toggleEndpoint('signin')">
            <h3>Sign In</h3>
            <div id="signin" class="details">
                <p>Authenticate and obtain an access token.</p>
                <pre>
                    <code>
                        POST /api/signin
                        Parameters:
                        - email (string)
                        - password (string)
                    </code>
                </pre>
            </div>
        </div>

        <div class="endpoint" onclick="toggleEndpoint('logout')">
            <h3>Logout</h3>
            <div id="logout" class="details">
                <p>Invalidate the access token and log out.</p>
                <pre>
                    <code>
                        POST /api/logout
                        Headers:
                        - Authorization: Bearer {ACCESS_TOKEN}
                    </code>
                </pre>
            </div>
        </div>

    </div>

    <script>
        function toggleEndpoint(endpointId) {
            const details = document.getElementById(endpointId);
            details.classList.toggle("show");
        }
    </script>
@endsection
