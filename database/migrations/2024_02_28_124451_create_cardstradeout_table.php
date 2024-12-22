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
        Schema::create('cardstradeout', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imageUrl',255);
            $table->string('setName')->nullable();
            $table->decimal('prezzo')->nullable();
            $table->string('rarity')->nullable();
            $table->boolean('foil')->nullable();
            $table->bigInteger('ref')->nullable();
            $table->decimal('prezzo_consigliato')->nullable();
            $table->string('manaCost')->nullable();
            $table->string('type')->nullable();
            $table->text('text')->nullable();
            $table->text('flavor')->nullable();

            $table->foreignId('session_id');
            $table->foreign('session_id')->on('sessions')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardstradeout');
    }
};
