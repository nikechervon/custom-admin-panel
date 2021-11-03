<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('employee_id');

            $table->foreign('manager_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('employee_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager_user');
    }
}
