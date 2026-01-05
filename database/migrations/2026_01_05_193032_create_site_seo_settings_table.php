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
        Schema::create('site_seo_settings', function (Blueprint $table) {
            $table->id();

            // Basic SEO
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('canonical_url')->nullable();

            // Favicon and Images
            $table->string('favicon')->nullable();
            $table->string('og_image')->nullable();

            // Open Graph (Facebook, LinkedIn)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_locale')->default('en_US');

            // Twitter Card
            $table->string('twitter_card_type')->default('summary_large_image');
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();

            // Analytics & Tracking
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();

            // Robots & Indexing
            $table->string('robots_meta')->default('index, follow');
            $table->string('googlebot_meta')->nullable();

            // Schema.org
            $table->string('organization_name')->nullable();
            $table->string('organization_logo')->nullable();
            $table->text('organization_description')->nullable();

            // Theme & Visual
            $table->string('theme_color')->default('#000000');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_seo_settings');
    }
};
