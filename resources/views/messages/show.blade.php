@extends('layouts.home')

@section('main_content')
<div class="row">
    <!-- seo fact area start -->
    
    <!-- testimonial area start -->
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"> Mensaje Enviado por {{$message->sender->name}} </h4>
                <div class="additional-content">
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">{{$message->asunto}}:</h4>
                        <p>{{$message->body}}</p>
                        <br>
                        <hr>
                        @if ($message->sender_id !== auth()->id())
                            <p class="mb-0 float-right"><input class="btn btn-rounded btn-primary mb-3 btn-sm float-right " data-toggle="modal" data-target="#modal_respond" type="button" value="Responder"></p>
                            <p>&nbsp;</p>
                        @endif
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- timeline area start -->
    <div class="col-xl-4 col-lg-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Mensajes</h4>
                    <div class="timeline-area">
                        @foreach ($messages as $item)
                            @if ($item->recipient_id === auth()->id())
                                <div class="timeline-task">
                                    <div class="icon bg1">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="tm-title">
                                        <h4>{{$item->asunto}}</h4>
                                        <span class="time"><i class="ti-time"></i>{{$item->created_at}}</span>
                                    </div>
                                    <p>{{$item->body_min}}
                                    </p>
                                </div>
                            @else
                                <div class="timeline-task">
                                    <div class="icon bg2">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="tm-title">
                                        <h4>{{$item->asunto}}</h4>
                                        <span class="time"><i class="ti-time"></i>{{$item->created_at}}</span>
                                    </div>
                                    <p>{{$item->body_min}}
                                    </p>
                                </div>    
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- timeline area end -->
</div>

@include('messages.modals.respond')
@endsection