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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->unique();
            $table->string('full_name');
            $table->string('profile_image')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->dateTime('join_date');
            $table->string('rank');
            $table->double('total_sales');
            $table->integer('active_downliners');
            $table->json('downliner_ids');
            $table->string('referral_code')->nullable();
            $table->string('upliner_id')->nullable();
            $table->integer('level')->default(1);
            $table->double('direct_sales')->default(0.0);
            $table->double('team_sales')->default(0.0);
            $table->double('total_commissions')->default(0.0);
            $table->double('available_commissions')->default(0.0);
            $table->json('level_commissions')->nullable();
            $table->json('qr_codes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('region')->nullable();
            $table->json('mlm_settings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
