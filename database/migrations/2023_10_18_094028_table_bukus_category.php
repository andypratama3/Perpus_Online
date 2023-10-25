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
        Schema::create('bukus_categorys', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreignUuid('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreignUuid('category_id')->references('id')->on('category_bukus')->onDelete('cascade');

            // Setting The Primary Keys
            $table->primary(['buku_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus_categorys');
    }
};
