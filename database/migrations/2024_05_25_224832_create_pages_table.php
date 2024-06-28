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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->tinyText('description')->nullable();
            $table->string('title_ar');
            $table->string('slug_ar');
            $table->tinyText('description_ar')->nullable();
            $table->longText('content');
            $table->string('cover')->nullable();
            $table->longText('content_ar');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->longText('is_published')->nullable()->default(0);
            $table->unique(['slug','group_id']);
            $table->unique(['slug_ar','group_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
