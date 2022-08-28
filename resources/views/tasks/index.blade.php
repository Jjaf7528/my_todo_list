@extends('base.base_login')

@section('title')
    ToDo List
@endsection

@section('content')

    <div class="mt-3 text-center">
        <h1 class="display-5 fw-bold">Agg Nueva Tarea</h1>    
    </div>

    <div class="d-flex justify-content-center pt-2">        
        <form method="POST">
            @csrf   
            @error('title')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror        
        <div class="mb-3">
            <label class="form-label">Tarea</label>
            <input name="name" id="" type="text" class="form-control" placeholder="Escribe una tarea" value="{{@old('name')}}">
            @error('name')
                <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <textarea name="description" cols="2" class="form-control" placeholder="Escribe una descripcion">{{@old('description')}}</textarea>    
            @error('description')
                <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
            @enderror     
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input name="date" type="date" class="form-control" value="{{@old('date')}}">
            @error('date')
                <h6 class="alert alert-danger mt-2"> {{ $message }} </h6>
            @enderror
        </div>            
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>            
        </form>
    </div>

    <div class="container pt-5">        
        <table class="table table-striped">
            <thead style="text-align:center;" >
            <tr>
                <th scope="col">Tarea</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody style="text-align:center;" >
                @foreach ($tasks as $task)  
            <tr>
                <th scope="row">{{$task->name}}</th>
                <td scope="row">{{$task->description}}</td>
                <td scope="row">{{$task->date}}</td>
                <td scope="row">
                    <button class="btn {{$task->status ? 'btn-success' : 'btn-warning'}}">{{$task->status ? 'Completada' : 'Pendiente'}}</button>
                </td>
                <td>                    
                    <a type="button" href="{{route('tasks.edit', $task->id)}}" class="btn btn-primary">Editar</a>         
                    <a type="button" href="{{route('tasks.show', $task->id)}}" class="btn btn-danger">Eliminar</a>                        
                </td>
            </tr> 
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
