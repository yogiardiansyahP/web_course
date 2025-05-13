<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('certificates')) {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('certificate_path')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamps();
        });
    }
}


    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}