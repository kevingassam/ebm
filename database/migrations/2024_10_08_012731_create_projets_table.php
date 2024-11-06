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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("photo");
            $table->text("photos")->nullable();
            $table->text("description");
            $table->text("map")->nullable();
            $table->text("video")->nullable();
            $table->enum("type",["résidentiel","commercial"])->default("résidentiel");
            $table->enum("statut",["en cours", "terminé"])->default("en cours");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
