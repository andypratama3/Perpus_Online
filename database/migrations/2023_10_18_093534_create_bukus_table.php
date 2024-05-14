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
        Schema::create('bukus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('description')->nullable()->default('text');
            $table->string('penerbit');
            $table->string('tahun_terbit');
            $table->string('penulis');
            $table->string('seri_buku');
            $table->string('buku');
            $table->string('user_add');
            $table->string('jumlah_pengunjung');
            $table->string('cover');
            $table->foreignUuid('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
