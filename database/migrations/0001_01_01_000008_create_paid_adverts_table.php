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
        Schema::create('paid_adverts', function (Blueprint $table) {
            $table->id();
            $table->char('status', 3)->nullable();
            $table->timestamp('activeUntil')->nullable();
            $table->integer('views')->nullable();
            $table->foreignId('advertID')->nullable()->constrained('adverts')
                ->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_adverts');
    }
};
