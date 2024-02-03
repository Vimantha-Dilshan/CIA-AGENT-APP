<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('weapons_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('weapon_code')->unique();
            $table->string('bullet_type');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('manufacturer');
            $table->date('purchase_date');
            $table->text('history')->nullable();
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weapons_inventory');
    }
};
