<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('file_id')->unsigned();
            $table->bigInteger('recipe_id')->unsigned();
            $table->timestamps();
            $table->foreign('file_id')
                  ->references('id')
                  ->on('files')
                  ->onDelete('cascade');
            $table->foreign('recipe_id')
                  ->references('id')
                  ->on('recipes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes_files');
    }
}
