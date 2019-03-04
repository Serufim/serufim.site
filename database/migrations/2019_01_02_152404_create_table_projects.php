<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->string('subtitle',127)->default("");
            $table->text('description')->default("");
            $table->string('demo')->nullable();
            $table->time('created_time')->nullable();
            $table->time('finished_time')->nullable();
            $table->string('current_version')->default("1.0.0");
            $table->string('license')->default("GPL");
            //TODO: Ссылки, картинки, языки программирования,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
