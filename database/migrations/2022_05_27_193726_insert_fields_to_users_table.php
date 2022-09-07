<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('department')->nullable();
            $table->string('student_id')->nullable();
            $table->string('session')->nullable();
            $table->string('username')->unique();
            $table->string('cover_photo')->nullable();
            $table->string('social_links')->nullable();
            $table->string('is_residential')->default('Yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
