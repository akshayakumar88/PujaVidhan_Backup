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
        Schema::create('yajmaans', function (Blueprint $table) {
            $table->id();
            $table->string('yajmaan_name');
            $table->string('purohit');
            $table->string('additional_purohit');
            $table->string('yajmaan_location');
            $table->string('yajmaan_street');
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
        Schema::dropIfExists('yajmaans');
    }
};
