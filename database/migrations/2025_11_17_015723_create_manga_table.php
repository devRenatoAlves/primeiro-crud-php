<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('manga', function (Blueprint $table) {
            $table->id()->cascadeOnDelete();
            $table->string('manga_name', 50)->unique();
            $table->integer('volumes');
            $table->integer('lidos')->default(0);
            $table->enum('status', ['Lendo','Dropei','Finalizado','Planejo Ler']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manga');
    }
};
