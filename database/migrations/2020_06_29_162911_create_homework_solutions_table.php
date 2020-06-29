<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworkSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_solutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('attachment');
            $table->string('assignedToName');
            $table->biginteger('homework')->unsigned();
            $table->foreign('homework')->references('id')->on('homework')->onDelete('cascade');
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
        Schema::dropIfExists('homework_solutions');
    }
}
