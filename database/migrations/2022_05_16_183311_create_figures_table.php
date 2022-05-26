<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiguresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->usignedBigInteger('figure_type_id');
            $table->foreign('figure_type_id')->references('figure_type_id')->on('figure_types');
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
        Schema::table('figures', function (Blueprint $table) {
            $table->dropForeign(['id']);
        });
        Schema::dropIfExists('figures');
    }
}
