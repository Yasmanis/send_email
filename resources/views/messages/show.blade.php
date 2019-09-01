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
                        <p class="mb-0 float-right"><input class="btn btn-rounded btn-primary mb-3 btn-sm float-right " data-toggle="modal" data-target="#modal_respond" type="button" value="Responder"></p>
                        <p>&nbsp;</p>
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
                    <h4 class="header-title">Mensajes Enviados</h4>
                    <div class="timeline-area">
                        <div class="timeline-task">
                            <div class="icon bg1">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="tm-title">
                                <h4>Rashed sent you an email</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg2">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="tm-title">
                                <h4>Rashed sent you an email</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg2">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="tm-title">
                                <h4>Rashed sent you an email</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg3">
                                <i class="fa fa-bomb"></i>
                            </div>
                            <div class="tm-title">
                                <h4>Rashed sent you an email</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg3">
                                <i class="ti-signal"></i>
                            </div>
                            <div class="tm-title">
                                <h4>Rashed sent you an email</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- timeline area end -->
</div>

@include('messages.modals.respond')
@endsection