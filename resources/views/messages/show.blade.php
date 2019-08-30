@extends('layouts.app')

@section('content')    
    <div class="container">
        <h1 class="text-center">Conversación con {{$message->sender->name}}</h1>
        <div class="row d-flex justify-content-start">
            <div class="card text-dark mb-3 col-sm-6" style="background-color: #73DA7B">
                <div class="card-header">{{$message->sender->name}}</div>
                <div class="card-body">
                <h5 class="card-title">Estimado(a) (A quien se le manda el mensaje):</h5>
                    <p class="card-text">{{$message->body}}</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="card bg-light mb-3 col-sm-6">
                <div class="card-header">Yo</div>
                <div class="card-body">
                    <h5 class="card-title">Estimado(a) {{$message->sender->name}}</h5>
                    <p class="card-text">El texto que respondo.</p>
                </div>
            </div>
        </div>  
        <form method="POST" action="{{route('response_message')}}">
                @csrf
                    <input type="hidden" name="user_response" value="{{$message->sender_id}}">
                    <div class="row">
                        <div class="col-sm-1">
                            <label for="respuesta">Responder</label>        
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control ml-2" id="respuesta" placeholder="Escribe un mensaje">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                        </div> 
        </form>
    </div>    
@endsection