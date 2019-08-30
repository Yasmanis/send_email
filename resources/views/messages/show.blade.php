@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mensaje Enviado por {{$message->sender->name}}</div>
    
                    <div class="card-body">
                        <h5 class="text-center">Contenido del mensaje</h5>
                        <hr>
                            <p>{{$message->body}}</p>
                    </div>
                </div>
                <form method="POST" action="{{route('response_message')}}">
                        @csrf
                        <input type="hidden" name="user_response" value="{{$message->sender_id}}">
                        <input class="btn btn-primary float-right" type="submit" value="Responder">
                </form>
            </div>
        </div>
    </div>
@endsection