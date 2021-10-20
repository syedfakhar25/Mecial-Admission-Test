<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_students', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_id');
            $table->integer('user_id');
            $table->string('status')->nullable(); //accepted or rejected
            $table->string('challan')->nullable();
            $table->date('status_update_date')->nullable();
            $table->date('apply_date');
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
        Schema::dropIfExists('applied_students');
    }
}
