<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('dpc'); // nilai default 'dpc', karena cuma 1 dpd
        $table->string('kabupaten')->nullable(); // hanya diisi untuk role dpc
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['role', 'kabupaten']);
    });
}

    
};
