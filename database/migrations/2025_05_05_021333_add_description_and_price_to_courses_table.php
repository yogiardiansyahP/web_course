<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        // Hapus baris ini:
        // $table->text('description')->after('name');

        // Biarkan hanya ini (kalau belum ditambahkan sebelumnya):
        $table->integer('price')->nullable()->after('status');
    });
}


};
