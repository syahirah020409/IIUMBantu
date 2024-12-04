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
        Schema::create('collab_donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id');
            $table->foreign('requester_id')->references('id')->on('users');
            $table->string('name',255);
            $table->text('description');
            $table->string('target_amount',255);
            $table->text('donation_for')->nullable();
            $table->string('poster',255);
            $table->string('background',255);
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('status')->default(0)->comment('0=>requesting,1=>approved,2=>rejected');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collab_donations');
    }
};
