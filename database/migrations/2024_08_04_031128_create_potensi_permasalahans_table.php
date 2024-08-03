<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_permasalahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_desa');
            $table->text('potensi');
            $table->text('permasalahan');
            $table->enum('status', ['belum dibantu', 'sudah dibantu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potensi_permasalahans');
    }
};
