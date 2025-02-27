<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> string('first_name') -> nullable();
            $table -> string('last_name') -> nullable();
            $table -> dicimal('phone') -> nullable();
            $table -> date('date_of_birth') -> nullable();
            $table -> string('address') -> nullable();
            $table -> unsignedBigInteger('hiearchy_id') -> nullable();
            
            $table->foreign('hierarchy_id')->references('id')->on('hierarchy'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
