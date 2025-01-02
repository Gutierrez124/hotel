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
        Schema::create('tiposhabitacionesimgs', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_habitacion_id');
            $table->text('img_src');
            $table->text('img_alt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiposhabitacionesimgs');
    }
};
