<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('exam')->nullable();
            $table->string('subject')->nullable();
            $table->string('institute')->nullable();
            $table->string('board')->nullable();
            $table->string('year')->nullable();
            $table->integer('obtained_marks')->nullable();
            //to check if its matric or fsc
            $table->string('qual_type')->nullable();
            //these three fields are for fresh candidates only
            $table->integer('phy')->nullable();
            $table->integer('chem')->nullable();
            $table->integer('bio')->nullable();
            $table->integer('total_science')->nullable();
            $table->boolean('fresh_candidate')->nullable();
            $table->integer('total_marks')->nullable();
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
        Schema::dropIfExists('qualifications');
    }
}
