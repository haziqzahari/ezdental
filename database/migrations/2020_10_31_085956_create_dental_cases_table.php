<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_id');
            $table->string('case_type');
            $table->string('case_1');
            $table->string('remark_1');
            $table->string('case_2');
            $table->string('remark_2');
            $table->boolean('verification_status');
            $table->string('case_status');
            $table->string('dentist_id');
            $table->string('dentist_name');
            $table->string('technician_id');
            $table->string('technician_name');
            $table->string('student_id');
            $table->string('student_name');
            $table->string('patient_name');
            $table->integer('workload');
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
        Schema::dropIfExists('dental_cases');
    }
}
