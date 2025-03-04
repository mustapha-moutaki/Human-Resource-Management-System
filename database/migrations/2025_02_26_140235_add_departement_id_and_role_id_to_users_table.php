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
           
            $table->unsignedBigInteger('departement_id')->nullable();

            $table->foreign('departement_id')
                ->references('id')->on('departements')
                ->onDelete('cascade');

           
            $table->unsignedBigInteger('role_id')->nullable();

            
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
            $table->dropColumn('departement_id');
            
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
