<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('head_id')->nullable();
            $table->dateTime('date_of_employment');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->float('salary');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('position_id')->references('id')
                ->on('positions')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('head_id')->references('id')
                ->on('employees')
                ->onUpdate('cascade');

            $table->foreign('image_id')->references('id')
                ->on('images')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('created_by')->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('updated_by')->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
