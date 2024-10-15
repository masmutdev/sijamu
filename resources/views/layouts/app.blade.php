<!DOCTYPE html>
<html>
<head>
    <title>Static CRUD App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Static CRUD App</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
