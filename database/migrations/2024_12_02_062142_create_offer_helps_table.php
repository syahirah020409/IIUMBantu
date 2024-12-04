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
        Schema::create('offer_helps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('request_helps');
            $table->unsignedBigInteger('helper_id');
            $table->foreign('helper_id')->references('id')->on('users');
            $table->string('help_type',255);
            $table->string('quantity', 255);
            $table->string('proof', 255);
            $table->unsignedBigInteger('status')->default(0)->comment('0=>unverified,1=>verified');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_helps');
    }
};
