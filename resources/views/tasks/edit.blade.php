@extends('base.base_login')

@section('title')
    Editar Tarea
@endsection

@section('content')

    <div class="mx-5 my-2">
        <a href="{{route('tasks.index')}}" class="btn btn-info"> <- Ir a la lista de tareas </a>
    </div>

    <div class="mt-3 text-center">
        <h1 class="display-5 fw-bold">Editar Tarea</h1>    
    </div>
        
    <div class="container d-flex justify-content-center pt-2">
        <form method="POST" action="{{route('tasks.update', $task->id)}}">
            @method('PUT')
            @csrf

            @if (session('success'))                
                <h6 class="alert alert-success"> {{session('success')}} </h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror  

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" id="" type="text" class="form-control" placeholder="Escribe una tarea" value="{{@old('name') ?? $task->name}}">
                @error('name')
                    <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" cols="2" class="form-control" placeholder="Escribe una description">{{@old('description') ?? $task->description}}</textarea>    
                @error('description')
                    <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
                @enderror    
            </div>

            <div class="mb-3">                        
                <label class="form-label">Estado</label>
                <select name="status" class="form-control">
                    <option value="{{$task->status === 0 ? 0 : 1}}">{{$task->status === 0 ? 'Pendiente' : 'Realizada'}}</option>
                    @if ($task->status === 0)
                        <option value="1">Realizada</option>
                    @endif
                    @if ($task->status === 1)
                        <option value="0">Pendiente</option>
                    @endif                    
                </select>  
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input name="date" type="date" class="form-control" value="{{@old('date') ?? $task->date}}">
                @error('date')
                 <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
                @enderror
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>            
        </form>
    </div>

 @endsection