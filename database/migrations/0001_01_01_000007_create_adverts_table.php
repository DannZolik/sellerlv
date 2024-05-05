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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->decimal("price", 13, 2)->nullable();
            $table->text("description")->nullable();
            $table->timestamp("activeUntil")->nullable();
            $table->char("status", 3)->nullable();
            $table->integer('views')->nullable();
            $table->foreignId('userID')->nullable()->constrained('users')
                ->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('categoryID')->nullable()->constrained('advert_categories')
                ->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
