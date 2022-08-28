<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @yield('styles')
</head>
<body>

    <nav class="navbar bg-light pb-3">
        <div class="container-fluid">  
            <a href="{{ route('tasks.index') }}" class="navbar-brand">My ToDo List</a>    
            @if (session('success'))  
                <div class="pt-2">
                    <a class="alert alert-success" style="text-decoration:none;"> {{session('success')}} </a>  
                </div>  
            @endif      
            <form class="d-flex pt-3"  action="{{ route('signOut') }}" method="POST">      
                @csrf                    
                <button class="btn btn-danger">Cerrar sesion</button>
            </form> 
        </div>
    </nav>      
    
    @yield('content')
    @yield('scripts')
</body>
</html>