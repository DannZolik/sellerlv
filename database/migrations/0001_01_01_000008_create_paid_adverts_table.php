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
            $table->char('Status', 3)->nullable();
            $table->timestamp('ActiveUntil')->nullable();
            $table->integer('Views')->nullable();
            $table->foreignId('AdvertID')->nullable()->constrained('adverts')
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
