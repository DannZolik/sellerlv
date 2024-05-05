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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('Value', 128)->nullable();
            $table->boolean('isPrivate')->nullable();
            $table->foreignId('UserID')->nullable()->constrained('users')
                ->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('UserDataTypeID')->nullable()->constrained('user_types')
                ->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
