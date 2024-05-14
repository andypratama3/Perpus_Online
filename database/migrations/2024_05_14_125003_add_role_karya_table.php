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
        Schema::table('karyas', function (Blueprint $table) {
            // Add the role_id column
            $table->foreignUuid('role_id')->nullable(); // Change to foreignUuid
        });

        // Define foreign key constraint
        Schema::table('karyas', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyas', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['role_id']);

            // Drop the role_id column
            $table->dropColumn('role_id');
        });
    }
};
