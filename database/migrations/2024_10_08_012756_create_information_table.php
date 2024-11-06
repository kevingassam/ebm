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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string("app_name")->default("EBM");
            $table->string("email1")->nullable();
            $table->string("email2")->nullable();
            $table->string("tel1")->nullable();
            $table->string("tel2")->nullable();
            $table->string("logo")->nullable();
            $table->string("icon")->nullable();
            $table->string("adresse1")->nullable();
            $table->string("adresse2")->nullable();
            $table->text("text_footer")->nullable();
            $table->text("slogan")->nullable();
            $table->text("map")->nullable();
            $table->text("video")->nullable();

            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("youtube")->nullable();
            $table->string("instagram")->nullable();
            $table->string("linkedin")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
