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
        Schema::create('sittings', function (Blueprint $table) {
            $table->id();
            $table->boolean('site_run');
            $table->boolean('comment_run');
            $table->string('contact_mail');
            $table->string('contact_phone');
            $table->string('view_lang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sittings');
    }
};
