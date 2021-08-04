<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->string('alamat_instansi');
            $table->string('logo_kiri')->nullable();
            $table->string('logo_kanan')->nullable();
            $table->string('emot_1')->nullable();
            $table->string('emot_2')->nullable();
            $table->string('emot_3')->nullable();
            $table->string('emot_4')->nullable();
            $table->string('emot_5')->nullable();
            $table->string('banner_static');
            $table->string('running_text');
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
        Schema::dropIfExists('surveys');
    }
}
