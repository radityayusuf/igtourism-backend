<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experience_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('experience_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('currency', 3)->default('IDR');
            $table->integer('min_persons')->default(1);
            $table->integer('max_persons')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('includes')->nullable();
            $table->json('excludes')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('tagline_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->text('route_summary')->nullable();
            $table->text('route_summary_id')->nullable();
            $table->integer('duration_days')->default(1);
            $table->decimal('price_from', 12, 2)->nullable();
            $table->string('currency', 3)->default('IDR');
            $table->string('target_audience')->nullable(); // family, premium, student, corporate
            $table->string('style')->nullable(); // solo, couple, family, group
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('journey_stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journey_id')->constrained()->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->integer('day_number');
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->json('activities')->nullable();
            $table->boolean('overnight')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('journey_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('journey_id')->constrained()->cascadeOnDelete();
            $table->date('booking_date');
            $table->integer('participants')->default(1);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->decimal('total_price', 12, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journey_bookings');
        Schema::dropIfExists('journey_stops');
        Schema::dropIfExists('journeys');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('experience_categories');
    }
};
