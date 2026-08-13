<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable(); // Indonesian name
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->json('map_data')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('islands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->foreignId('island_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->json('geo_json')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('gi_destination_count')->default(0);
            $table->integer('gi_product_count')->default(0);
            $table->integer('experience_count')->default(0);
            $table->timestamps();
        });

        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('tagline_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('map_embed')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('islands');
        Schema::dropIfExists('regions');
    }
};
