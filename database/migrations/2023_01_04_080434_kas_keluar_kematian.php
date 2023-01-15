<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KasKeluarKematian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_keluar_kematian', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('jumlah');
            $table->date('tanggal');
            $table->longText('keperluan');
            $table->date('updated_at')->nullable();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_keluar_kematian');
    }
}
