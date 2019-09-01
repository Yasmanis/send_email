<?php

use Illuminate\Database\Seeder;
use App\Message;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        $var = Str::random(160);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);
        
        
        $var = Str::random(160);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = Str::random(160);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = Str::random(160);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = Str::random(160);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = Str::random(160);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => Str::title(Str::random(10)),
            'body' => Str::random(160),
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);


    }
}
