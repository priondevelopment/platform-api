<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('type');
            $table->morphs('notifiable');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('link', 700)->nullable();
            $table->text('data');

            $table->string('owner_type', 700)->nullable();
            $table->integer('owner_id', 700)->nullable();

            $table->timestamp('deliver_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
