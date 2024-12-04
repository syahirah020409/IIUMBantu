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
        Schema::create('request_helps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id');
            $table->foreign('requester_id')->references('id')->on('users');
            $table->string('request_number',255)->nullable();
            $table->string('category',255);
            $table->string('details', 255);
            $table->string('quantity', 255);
            $table->string('urgent', 255);
            $table->string('phone_number', 255);
            $table->string('proof', 255);
            $table->string('qr_code', 255);
            $table->text('latitude_map');
            $table->text('longitude_map');
            $table->text('full_address');
            $table->unsignedBigInteger('declaration');
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('status')->default(0)->comment('0=>requesting,1=>approved,2=>rejected,3=>helped');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_helps');
    }
};
