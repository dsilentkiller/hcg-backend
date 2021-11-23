<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable()->default('text');
            $table->string('image')->nullable();

            $table->longText('summary')->nullable()->default('text');

            $table->string('title_tag', 100)->nullable()->default('text');

            $table->text('meta_keywords')->nullable()->default('text');

            $table->text('meta_description')->nullable()->default('text');

            $table->integer('created_by')->unsigned()->nullable()->default(12);

            $table->softDeletes();



            $table->longText('description')->nullable()->default('text');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
