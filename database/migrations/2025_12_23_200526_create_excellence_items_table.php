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
        Schema::create('excellence_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('link_text')->default('Learn more');
            $table->string('link_url')->default('#learn-more');
            $table->string('icon_type')->default('svg');
            $table->text('icon_svg')->nullable();
            $table->string('icon_image')->nullable();
            $table->boolean('icon_primary_style')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excellence_items');
    }
};
