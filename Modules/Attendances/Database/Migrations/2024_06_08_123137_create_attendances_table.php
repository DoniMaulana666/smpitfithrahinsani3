<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attendances_teacher_id');
            $table->bigInteger('attendances_subject_id');
            $table->bigInteger('attendances_grade_id');
            $table->json('attendances_student_id');
            $table->json('attendances_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
