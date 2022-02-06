<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('summary');
            $table->bigInteger('happy_clients')->nullable();
            $table->bigInteger('project_done');
            $table->string('image');
            $table->softDeletes();
            $table->bigInteger('created_by')->nullable();
            $table->text('title_tag');
            $table->text('meta_keywords');
            $table->text('meta_description');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
