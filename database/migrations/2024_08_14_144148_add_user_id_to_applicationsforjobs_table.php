<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToApplicationsforjobsTable extends Migration
{
    public function up()
    {
        Schema::table('applicationsforjobs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('job_id'); // Adding user_id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('applicationsforjobs', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint
            $table->dropColumn('user_id'); // Drop the column
        });
    }
}
