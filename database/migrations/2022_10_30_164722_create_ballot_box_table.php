<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallotBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballot_box', function (Blueprint $table) {
            $table->increments ('id');
            $table->unsignedInteger ('voter_id')->nullable();
            $table->unsignedInteger ('cand_id')->nullable();
            $table->integer ('otp_code')->nullable();
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
        Schema::dropIfExists('ballot_box');
    }
}
