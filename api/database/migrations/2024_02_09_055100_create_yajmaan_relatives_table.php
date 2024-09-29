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
        Schema::create('yajmaan_relatives', function (Blueprint $table) {
            $table->id();
            $table->string('relname');
            $table->string('relation');
            $table->string('toexp');
            $table->string('poexp');
            $table->string('moexp');
            $table->unsignedBigInteger('yajmaan_id');
            $table->foreign('yajmaan_id')->references('id')->on('yajmaans');
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
        Schema::dropIfExists('yajmaan_relatives');
    }
};
