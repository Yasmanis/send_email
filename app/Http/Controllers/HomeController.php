<?php

namespace App\Http\Controllers;

use App\Events\CorreoPadres;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $message = DB::table('messages')
                    ->where([
                        ['sender_id', '=', auth()->id()],
                        ['recipient_id', '=', $request->user_id]
                    ])
                    ->orWhere([
                             ['sender_id', '=', $request->user_id],
                             ['recipient_id', '=', auth()->id()]
                    ])
                    ->get();
     
        if ($message->count()) 
        {
            $message = $message->all();
            $messages = Message::create([
                'sender_id' => auth()->id(),
                'conversation_id' => $message[0]->conversation_id,
                'recipient_id' => $request->user_id,
                'asunto' => Str::title($request->asunto),
                'body' => $request->body,
                'body_min' => Str::limit($request->body, 85),
                'token' => Str::random(60)
            ]);
        }else
        {
            $message = DB::table('messages')->max('conversation_id');
            if (empty($message)) {
                $conversation_id = 1;
            } else {
                $conversation_id = $message->conversation_id + 1;
            }
            
            $messages = Message::create([
                'sender_id' => auth()->id(),
                'conversation_id' => $conversation_id,
                'recipient_id' => $request->user_id,
                'asunto' => Str::title($request->asunto),
                'body' => $request->body,
                'body_min' => Str::limit($request->body, 85),
                'token' => Str::random(60)
            ]);
        }

        event(new CorreoPadres($messages));

        return back()->with('info','Mensaje enviado');
        

    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        $user = User::findOrFail($message->sender_id);
        $messages = Message::where('conversation_id','=',$message->conversation_id)->orderByDesc('created_at')->take(5)->get();
      
        return view('messages.show', compact('message','user','messages'));
    }

    public function response_message(Request $request)
    {
        $messages = Message::create([
            'sender_id' => auth()->id(),
            'conversation_id' => $request->conversation_id,
            'recipient_id' => $request->user_response,
            'asunto' => Str::title('De',auth()->user()->name),
            'body' => $request->body,
            'body_min' => Str::limit($request->body, 85),
            'token' => Str::random(60)
        ]);

        return back()->with('info','Mensaje respondido');

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
