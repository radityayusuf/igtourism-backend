<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('article_categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->text('excerpt_id')->nullable();
            $table->longText('body')->nullable();
            $table->longText('body_id')->nullable();
            $table->string('author')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('event_type')->nullable(); // festival, trade_show, competition, workshop
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->string('image')->nullable();
            $table->string('registration_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content_id')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_description_id')->nullable();
            $table->timestamps();
        });

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->enum('type', ['travel_trade', 'business', 'academy', 'government', 'ngo'])->default('business');
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('general');
            $table->string('question');
            $table->string('question_id')->nullable();
            $table->text('answer');
            $table->text('answer_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('travel_tips', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('general');
            $table->string('title');
            $table->string('title_id')->nullable();
            $table->text('content');
            $table->text('content_id')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('type')->nullable(); // hotel, homestay, villa, resort
            $table->string('price_range')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accommodations');
        Schema::dropIfExists('travel_tips');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('events');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_categories');
    }
};
