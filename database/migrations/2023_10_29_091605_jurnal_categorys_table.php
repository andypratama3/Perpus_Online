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
        Schema::create('jurnal_categorys', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreignUuid('jurnal_id')->references('id')->on('jurnals')->onDelete('cascade');
            $table->foreignUuid('category_buku_id')->references('id')->on('category_bukus')->onDelete('cascade');

            // Setting The Primary Keys
            $table->primary(['jurnal_id', 'category_buku_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_categorys');
    }
};
