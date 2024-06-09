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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->longText('address');
            $table->string('phone');
            $table->string('alt_phone');
            $table->string('email');
            $table->string('alt_email');
            $table->string('whatsapp');
            $table->longText('map');
            $table->string('yt_link');
            $table->string('insta_link');
            $table->string('fb_link');
            $table->string('linked_link');
            $table->string('pt_link');
            $table->string('x_link');
            $table->string('ft_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
