<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add GI Passport fields to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('email');
            $table->string('google_id')->nullable()->after('avatar');
            $table->string('passport_tier')->default('explorer')->after('google_id'); // explorer, traveler, master, ambassador
            $table->integer('total_stamps')->default(0)->after('passport_tier');
        });

        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_id')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('icon')->nullable();
            $table->string('badge_image')->nullable();
            $table->integer('stamps_required');
            $table->string('reward_type')->nullable(); // certificate, badge, experience, gift
            $table->string('reward_value')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('passport_stamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->timestamp('stamped_at');
            $table->string('stamp_image')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'destination_id']);
        });

        Schema::create('user_milestones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('milestone_id')->constrained()->cascadeOnDelete();
            $table->timestamp('achieved_at');
            $table->string('certificate_url')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'milestone_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_milestones');
        Schema::dropIfExists('passport_stamps');
        Schema::dropIfExists('milestones');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'google_id', 'passport_tier', 'total_stamps']);
        });
    }
};
