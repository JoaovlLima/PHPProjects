<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKanbansTable extends Migration
{
    public function up()
    {
        Schema::create('kanbans', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('data_criacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kanbans');
    }
}
