<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('grade_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('mi');
            $table->string('address');
            $table->string('email');
            $table->string('contactno');
            $table->string('image');
            $table->string('father');
            $table->string('femail');
            $table->string('fcontactno');
            $table->string('fimage');
            $table->string('mother');
            $table->string('memail');
            $table->string('mcontactno');
            $table->string('mimage');
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
        Schema::dropIfExists('students');
    }
}
