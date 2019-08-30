@extends('layouts.app')

@section('content')
    <h1>Mensaje</h1>
    <p>{{$message->body}}</p>
    <small>Enviado por {{$message->sender->name}}</small>
    <form method="POST" action="{{route('response_message')}}">
        @csrf
        <input type="hidden" name="user_response" value="{{$message->sender_id}}">
        <input type="submit" value="Responder">
    </form>
@endsection