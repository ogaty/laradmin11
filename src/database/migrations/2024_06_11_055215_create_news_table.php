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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('news_category_id');
            $table->string('title')->nullable(false)->default("no title");
            $table->longText('body')->nullable(false);
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->dateTime('published_at')->nullable(false)->default(now());
            $table->string('path')->nullable();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
