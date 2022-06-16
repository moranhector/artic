<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('descripcion')->nullable();
            $table->decimal('precio', 11,2)->nullable();
            $table->decimal('costo', 11,2)->nullable();
            $table->integer('categoria_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
