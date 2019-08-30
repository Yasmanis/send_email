@extends('layouts.app')

@section('content')
<div class="container">
       
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('info'))
                <div class="alert alert-success"> {{ session('info') }} </div>
            @endif
            <div class="card">
                
                <div class="card-header">Enviar mensaje</div>

                <div class="card-body">
                   <form action="{{route('messages.store')}}" method="post">
                    @csrf
                   <div class="form-group">
                       <select class="form-control" name="user_id" id="">
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
                   @if (!empty($_GET))
                       <input type="hidden" name="responder" value="1">
                   @endif    
                   <div class="form-group">
                        <textarea class="form-control" placeholder="Escribe aki tu mensaje" name="body" id="" cols="30" rows="5"></textarea>
                   </div>
                   <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Enviar</button>
                   </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
