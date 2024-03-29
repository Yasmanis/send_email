<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('conversation_id');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('recipient_id');
            $table->text('asunto');
            $table->text('body');
            $table->text('body_min');
            $table->string('token', 80)
                                    ->unique()
                                    ->nullable()
                                    ->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
