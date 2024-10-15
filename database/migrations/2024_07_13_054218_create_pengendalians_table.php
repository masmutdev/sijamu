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
        Schema::create('pengendalians', function (Blueprint $table) {
            $table->id('id_pengendalian');
            $table->string('bidang_standar');
            $table->string('program_studi');
            $table->string('laporan_rtm');
            $table->string('laporan_rtl');
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
        Schema::dropIfExists('pengendalians');
    }
};
