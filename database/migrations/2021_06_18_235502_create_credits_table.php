<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contrat_id")->unique();
            $table->unsignedInteger("montant_total");
            $table->timestamp("completed")->default(null)->nullable();
            $table->timestamp("du");
            $table->timestamps();

            $table->foreign("contrat_id")
                ->references("id")
                ->on("contrats")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
