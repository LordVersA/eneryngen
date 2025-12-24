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
        Schema::create('technical_support_tiles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('button_text')->default('Contact us');
            $table->string('button_url')->default('#contact');
            $table->string('background_color')->default('linear-gradient(135deg, rgba(249, 250, 251, 0.6) 0%, rgba(243, 244, 246, 0.8) 100%)');
            $table->string('border_accent_color')->default('#00b3c1');
            $table->string('icon_type')->default('none');
            $table->text('icon_svg')->nullable();
            $table->string('icon_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_support_tiles');
    }
};
