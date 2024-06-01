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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ar');
            $table->string('slug');
            $table->string('slug_ar');
            $table->unsignedBigInteger('space_id');
            $table->foreign('space_id')->references('id')->on('spaces');
            $table->boolean('is_published')->default(0);
            $table->unique(['space_id', 'slug']);
            $table->unique(['space_id', 'slug_ar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
