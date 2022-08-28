@extends('base.base')

@section('title')
    My ToDo List
@endsection

@section('content') 

  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Welcome</h1>
    <div class="col-lg-6 mx-auto">
      <img src="https://todo-list-front.herokuapp.com/assets/img/todo.png" alt="" width="95" height="95"><p>
      <p class="lead mb-4">My ToDo list with laravel and Blade.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="{{route('login')}}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Iniciar Sesion</a>
      </div>
    </div>
  </div>

@endsection