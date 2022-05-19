<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativePersonMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_person_mangas', function (Blueprint $table) {
            $table->unsignedBigInteger('creative_person_id');
            $table->foreign('creative_person_id')->references('id')->on('creative_people')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('manga_id');
            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('creative_type');

            $table->primary(array('creative_person_id', 'manga_id'));
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
        Schema::table('creative_person_mangas', function (Blueprint $table) {
            $table->dropForeign(['manga_id']);
            $table->dropForeign(['creative_person_id']);
        });
        Schema::dropIfExists('creative_person_mangas');
    }
}
