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
        Schema::create('book_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('author_id');

            $table->index('book_id', 'book_author_book_idx');
            $table->index('author_id', 'book_author_author_idx');

            $table->foreign('book_id', 'book_author_book_fk')->on('books')->references('id');
            $table->foreign('author_id', 'book_author_author_fk')->on('authors')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_authors');
    }
};
