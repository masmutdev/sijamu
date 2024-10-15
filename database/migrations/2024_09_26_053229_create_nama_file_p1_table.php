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
        Schema::create('nama_file_p1', function (Blueprint $table) {
            $table->id('id_nfp1');
            //foreign key
            $table->foreignId('id_fp1')->references('id_fp1')->on('file_p1')->onDelete('restrict');

            $table->string('nama_filep1');
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
        Schema::dropIfExists('nama_file_p1');
    }
};
