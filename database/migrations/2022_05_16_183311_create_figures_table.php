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
            $table->unsignedBigInteger('id');
            $table->string('figure_type');
            $table->foreign('id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
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
