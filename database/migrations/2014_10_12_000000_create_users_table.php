<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('roll_no')->unique();
            $table->string('user_type')->nullable();
            $table->string('image')->nullable();

            //fields related to entry test
            $table->bigInteger('entry_marks')->unique();
            $table->string('test_center')->nullable();
            $table->integer('chem')->nullable();
            $table->integer('bio')->nullable();
            $table->integer('physics')->nullable();
            $table->date('test_date')->nullable();

            $table->string('category')->nullable(); //selection of quota
            $table->string('preference')->nullable(); //selection of colleges
            $table->string('test_type')->nullable();
            $table->boolean('approved')->nullable();
            $table->boolean('hafiz_quran')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->date('dob')->nullable();
            $table->string('domicile')->nullable();
            $table->string('area')->nullable(); //rural or urban
            $table->string('cnic', 13)->unique();
            $table->string('address')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
