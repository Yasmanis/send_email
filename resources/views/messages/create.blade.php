@extends('layouts.home')

@section('main_content')
<form method="post" action="{{route('messages.store')}}">
    @csrf
<div class="row d-flex">

    <div class="col-sm-none col-md-block col-2 mt-5"></div>
    
        <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-center">Nueva Comunicación</h4>
                        <div class="form-group d-flex">
                            <label for="example-text-input" class="col-form-label" style="width: 25%">CC:</label>
                            <select class="form-control" name="user_id" id="" required>
                           <option value="">Selecciona un usuario</option>
                           @foreach ($users as $user)
                                @if (!empty($_GET))
                                    <option value="{{$user->id}}" selected >{{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                           @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex">        
                            <label for="example-text-input" class="col-form-label" style="width: 25%">Asunto:</label>
                            <input class="form-control" type="text" value="" name="asunto" id="example-text-input" required>
                        </div>
                        <textarea class="form-control" id="story" placeholder="Escribe aquí tu mensaje" name="body" rows="5" cols="33"></textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-primary mb-3 float-right" value="Enviar">
                </div>
            </div>

            <div class="d-sm-none d-md-block col-2 mt-5">
                <div class="card">
                        <div class="card-body">
                <b class="text-muted mb-3 d-block">Opciones:</b>
                <div class="custom-control custom-checkbox"
                style="    margin-left: 20px;">
                        <input type="checkbox" checked class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Individual</label>
                    </div>
                    <div class="custom-control custom-checkbox" style="    margin-left: 20px;">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Toda la Clase</label>
                    </div>
    <br>
    
                     
                            </div>
                        </div>
    
        </div>

   </div>
   <br>
</form>
@if (session()->has('info'))
                <div class="alert alert-success"> {{ session('info') }} </div>
            @endif
@endsection