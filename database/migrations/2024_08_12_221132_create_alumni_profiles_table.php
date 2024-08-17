<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('profile_pic')->nullable();
            $table->string('name');
            $table->text('who_am_i')->nullable();
            $table->text('about_me')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('github_link')->nullable();
            $table->string('linkedin_link')->nullable();

            // Individual fields for experience
            $table->string('company_name')->nullable();
            $table->string('position_held')->nullable();
            $table->string('startWork_year')->nullable();
            $table->string('endWork_year')->nullable(); // Start and end year, e.g., "2020-2022"
            $table->text('roles')->nullable();

            // Individual fields for education
            $table->string('institution_name')->nullable();
            $table->string('course_done')->nullable();
            $table->string('startCourse_year')->nullable();
            $table->string('endCourse_year')->nullable(); // Start and end year, e.g., "2016-2020"

            $table->json('skills')->nullable();    // Store skills as an array
            $table->json('languages')->nullable(); // Store languages as an array
            $table->json('hobbies')->nullable();   // Store hobbies as an array

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni_profiles');
    }
}
