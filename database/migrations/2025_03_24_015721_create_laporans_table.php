<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pelapor')->constrained('users')->onDelete('cascade');
        $table->text('isi_laporan');
        $table->string('status')->default('Terkirim');

        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
