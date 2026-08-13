<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('cuisine_type')->nullable();
            $table->string('price_range')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('bio')->nullable();
            $table->text('bio_id')->nullable();
            $table->string('specialty')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('instructions')->nullable();
            $table->string('image')->nullable();
            $table->integer('prep_time')->nullable();
            $table->integer('cook_time')->nullable();
            $table->string('servings')->nullable();
            $table->timestamps();
        });

        Schema::create('recipe_product', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gi_product_id')->constrained()->cascadeOnDelete();
            $table->primary(['recipe_id', 'gi_product_id']);
        });

        Schema::create('food_pairings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_a_id')->constrained('gi_products')->cascadeOnDelete();
            $table->foreignId('product_b_id')->constrained('gi_products')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('gastronomy_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->json('destinations')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gastronomy_routes');
        Schema::dropIfExists('food_pairings');
        Schema::dropIfExists('recipe_product');
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('chefs');
        Schema::dropIfExists('restaurants');
    }
};
