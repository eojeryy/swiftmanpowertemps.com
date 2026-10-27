<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('seo_title')->nullable();
            $table->string('meta_description', 400)->nullable();
            $table->string('primary_keyword')->nullable();
            $table->string('target_audience')->nullable();
            $table->string('search_intent', 40)->nullable();
            $table->string('image_alt')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'meta_description', 'primary_keyword', 'target_audience', 'search_intent', 'image_alt']);
        });
    }
};
