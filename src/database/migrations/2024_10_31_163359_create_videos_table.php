<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Klucz obcy do tabeli users
            $table->string('url'); // Kolumna do przechowywania URL
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }

}
