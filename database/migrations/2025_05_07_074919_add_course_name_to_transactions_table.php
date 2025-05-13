<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasColumn('transactions', 'course_name')) {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('course_name')->nullable();
        });
    }
}

    
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('course_name');
        });
    }
    
};
