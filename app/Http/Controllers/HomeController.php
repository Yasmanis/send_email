<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Message;
use App\Mail\EmergencyCallReceived;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['veriftoken']]);
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
            'body' => $request->body,
            'token' => Str::random(60)
        ]);

        //capturamos el usuario al que seenvia el mensaje
        $recipient = User::find($request->user_id);
       
        //enviar mensaje por correo
        //Mail::to($recipient->email)->send(new EmergencyCallReceived($messages));

        //enviar notification por correo
        $recipient->notify(new SendNotification($messages));
        
        if($request->responder){
            return back()->with('info','Mensaje respondido');
        }else{
            return back()->with('info','Mensaje enviado');
        }

    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function response_message(Request $request)
    {

        $users = User::where('id', '!=', auth()->id())->get();
        $user_response = $request->user_response;

        return redirect()->route('home', compact('users','user_response'));

    }

    public function veriftoken($token)
    {
        $truncated = Str::limit($token, 60);
        $token_recib = trim($truncated, ".");
        $id = Str::after($token, $token_recib);
        $message = Message::findOrFail($id);

        if ($token_recib === $message->token ) {
            $user = User::findOrFail($message->recipient_id);
            if (Auth::id() != $user->id) {
                Auth::guard()->logout();
            }
            $var = [
                'email' => $user->email,
                'password' => decrypt($user->hash)
            ];
            
            Auth::guard()->attempt($var,false);
            return redirect()->route('messages.show',$id);
        }
        
    }
}
