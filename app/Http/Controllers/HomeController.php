<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Mail\EmergencyCallReceived;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('home', compact('users'));
    }

    public function store(Request $request)
    {
        $messages = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->user_id,
            'body' => $request->body
        ]);

        //capturamos el usuario al que seenvia el mensaje
        $recipient = User::find($request->user_id);
       
        //enviar mensaje por correo
        Mail::to($recipient->email)->send(new EmergencyCallReceived($messages));

        //enviar notification por correo
        $recipient->notify(new SendNotification($messages));

        return back();
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }
}
