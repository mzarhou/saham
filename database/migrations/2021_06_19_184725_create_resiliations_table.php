<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resiliations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contrat_id")->unique();
            $table->integer("montant");
            $table->unsignedBigInteger("montant_total");
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
        Schema::dropIfExists('resiliations');
    }
}
