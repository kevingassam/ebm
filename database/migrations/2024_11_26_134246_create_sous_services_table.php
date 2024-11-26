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
        Schema::create('sous_services', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger("service_id");
            $table->timestamps();


            //relation
            $table
            ->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_services');
    }
};
