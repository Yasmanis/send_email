<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Message::truncate();

        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);
        
        
        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 1,
            'conversation_id' => 1,
            'recipient_id' => 2,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);

        $var = ucwords($faker->catchPhrase .' '.$faker->bs);
        Message::create([
            'sender_id' => 2,
            'conversation_id' => 1,
            'recipient_id' => 1,
            'asunto' => $faker->sentence(2),
            'body' => $var,
            'body_min' => Str::limit($var, 85),
            'token' => Str::random(60)
        ]);


    }
}
