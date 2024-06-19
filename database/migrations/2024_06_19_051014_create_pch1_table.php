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
        Schema::create('pch1', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('docentry');
            $table->string('itemcode', 10);
            $table->string('itemname', 50);
            $table->decimal('price', 10, 2);
            $table->foreign('docentry')->references('docentry')->on('opch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pch1');
    }
};
