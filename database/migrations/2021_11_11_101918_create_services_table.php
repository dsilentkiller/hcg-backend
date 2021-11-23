<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title', 100)->nullable()->default('text');

            $table->string('heading', 100)->nullable()->default('text');

            $table->string('image', 100)->nullable()->default('text');

            $table->longText('description')->nullable()->default('text');

            $table->integer('start_from')->unsigned()->nullable()->default(12);

            $table->integer('created_by')->unsigned()->nullable()->default(12);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
