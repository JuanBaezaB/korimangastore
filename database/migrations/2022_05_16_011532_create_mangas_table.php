<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('editorial_id');
            $table->foreign('id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('mangas', function (Blueprint $table) {
            $table->dropForeign(['editorial_id']);
            $table->dropForeign(['format_id']);
            $table->dropForeign(['id']);
        });
        Schema::dropIfExists('mangas');
    }
}
