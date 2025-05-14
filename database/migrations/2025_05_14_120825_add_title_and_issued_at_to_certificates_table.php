<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('certificates', 'issued_at')) {
                $table->timestamp('issued_at')->nullable();
            }
        });
    }
    
    
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn(['title', 'issued_at']);
        });
    }
    
};
