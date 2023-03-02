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
        Schema::create('ListEntries', function (Blueprint $table) {
            $table->uuid('Id')->primary();
            $table->uuid('List_Id');
            $table->foreign('List_Id')->references('Id')->on('Lists');
            $table->string('Name');
            $table->boolean('Bought');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ListEntries');
    }
};
