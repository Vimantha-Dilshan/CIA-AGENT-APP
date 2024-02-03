<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('safe_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('security_level', ['LEVEL-1', 'LEVEL-2', 'LEVEL-3', 'LEVEL-4']);
            $table->enum('status', ['SAFE', 'DANGER']);
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('agent_in_charge')->nullable();
            $table->date('established_in');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('agent_in_charge')->references('id')->on('agents');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('safe_houses');
    }
};
