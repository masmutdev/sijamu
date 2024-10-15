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
        Schema::create('penetapans', function (Blueprint $table) {
            $table->id('id_penetapan');
            $table->string('submenu_penetapan');

            //foreign key
            $table->foreignId('id_nfp1')->references('id_nfp1')->on('nama_file_p1')->onDelete('restrict');
            $table->foreignId('id_fp1')->references('id_fp1')->on('file_p1')->onDelete('restrict');

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
        Schema::dropIfExists('penetapans');
    }
};
