<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInBallotBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ballot_box', function (Blueprint $table) {
            $table->foreign('voter_id') ->references('id')-> on ('users');
            $table->foreign('cand_id') ->references('id')-> on ('candidates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ballot_box', function (Blueprint $table) {
            //
        });
    }
}
