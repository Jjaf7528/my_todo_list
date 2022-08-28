@extends('base.base')

@section('title')
    Iniciar Sesion
@endsection

@section('content')

  <div class="px-4 pt-4 text-center">
    <h1 class="display-5 fw-bold">Iniciar Sesion</h1>  
  </div>
  <div class="d-flex justify-content-center pt-2">            
      <form action="{{ route('login.verify') }}" method="POST">
        @csrf
        @error('invalid_credentials')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <small> {{$message}}</small>          
        </div>            
        @enderror   
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" value="{{@old('email')}}" placeholder="Correo electronico">
        </div>  
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
        </div>
        @error('password')
        <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
        @enderror        
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
  </div>
    
@endsection