<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('gi_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('product_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('origin_story')->nullable();
            $table->text('origin_story_id')->nullable();
            $table->text('landscape_desc')->nullable();
            $table->text('landscape_desc_id')->nullable();
            $table->text('process_desc')->nullable();
            $table->text('process_desc_id')->nullable();
            $table->text('taste_profile')->nullable();
            $table->text('taste_profile_id')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('producers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('role')->nullable();
            $table->string('role_id')->nullable();
            $table->string('village')->nullable();
            $table->text('story')->nullable();
            $table->text('story_id')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('producer_product', function (Blueprint $table) {
            $table->foreignId('producer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gi_product_id')->constrained()->cascadeOnDelete();
            $table->primary(['producer_id', 'gi_product_id']);
        });

        Schema::create('supply_chain_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gi_product_id')->constrained()->cascadeOnDelete();
            $table->integer('step_order');
            $table->enum('level', ['country', 'province', 'district', 'village', 'farmer_group', 'processing', 'product']);
            $table->string('label');
            $table->string('label_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('icon')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supply_chain_steps');
        Schema::dropIfExists('producer_product');
        Schema::dropIfExists('producers');
        Schema::dropIfExists('gi_products');
        Schema::dropIfExists('product_categories');
    }
};
