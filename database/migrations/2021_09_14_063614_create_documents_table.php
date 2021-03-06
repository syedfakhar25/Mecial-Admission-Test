<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('matric')->nullable();
            $table->string('fsc')->nullable();
            $table->string('cnic')->nullable();
            $table->string('state_subject')->nullable();
            $table->string('domicile')->nullable();
            $table->string('prc')->nullable();
            $table->string('mcat_result')->nullable();
            $table->string('signature')->nullable();
            $table->string('overseas')->nullable();
            $table->string('disable')->nullable();
            $table->string('doctor')->nullable();
            $table->string('hafiz')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
