<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('member_caregiver_name');
            $table->string('member_caregiver_relation');
            $table->string('member_medical_condition');
            $table->string('member_medical_number');
            $table->string('member_meal_type')->nullable();
            $table->string('member_meal_distance')->nullable();
            $table->string('location');
            $table->integer('member_meal_duration');
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
        Schema::dropIfExists('members');
    }
};