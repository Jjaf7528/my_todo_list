@extends('base.base')

@section('title')
    Iniciar Sesion
@endsection

@section('content')  

  <div class="px-4 pt-4 text-center">
    <h1 class="display-5 fw-bold">Registrate</h1>  
  </div>

  <div class="d-flex justify-content-center pt-2">      
    <form action="" method="POST">
      @csrf   
      @error('email already exists')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <small> {{$message}}</small>          
      </div>            
      @enderror 
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{@old('email')}}">
      </div>
      @error('email')
      <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
      @enderror  
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>      
      @error('password')
      <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
      @enderror   
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Acepta los términos y condiciones
          </label>  
          <p></p>       
        </div>
      </div>
      <div class="">
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div >
    </form>
  </div>
    
@endsection