<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPatientAttributesToAppointmentTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('appointments', function (Blueprint $table) {
      $table->dropForeign('appointments_patient_id_foreign');
      $table->dropColumn('patient_id');
      $table->string('rut')->nullable();
      $table->string('name')->nullable();
      $table->string('lastname')->nullable();
      $table->string('gender')->nullable();
      $table->string('phone')->nullable();
      $table->string('cellphone')->nullable();
      $table->string('email')->nullable();
      $table->string('observation')->nullable();

    });

  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('appointments', function (Blueprint $table) {

    });
  }

}
