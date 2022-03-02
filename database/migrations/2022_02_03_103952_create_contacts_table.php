<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();;
            $table->string('email')->nullable();;
            $table->bigInteger('contact_no')->nullable();
            $table->text('subject')->nullable();
            $table->longtext('message')->nullable();;
            $table->longtext('meta_keywords')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('created_by')->nullable();;
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
        Schema::dropIfExists('contacts');
    }
}
