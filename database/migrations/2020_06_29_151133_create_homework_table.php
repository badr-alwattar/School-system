<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('attachment');
            $table->string('solution')->nullable();
            $table->string('assignedToName');
            $table->boolean('solution_uploaded')->default(false);
            $table->biginteger('assignedTo')->unsigned();
            $table->foreign('assignedTo')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('homework');
    }
}
