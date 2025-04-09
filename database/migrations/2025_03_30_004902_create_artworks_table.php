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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Reference to the user who created the artwork
            $table->unsignedBigInteger('category_id'); // fk reference to the category name
            $table->string('artwork_title');
            $table->text('description');
            $table->string('image_path');
            $table->double('price')->default(0);
            $table->timestamps();

             // Foreign keys yes
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
        Schema::table('artworks', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
