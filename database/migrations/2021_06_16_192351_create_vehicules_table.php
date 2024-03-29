<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");

            $table->string('puissance_energie');
            $table->string('numero_immatriculation');
            $table->string('marque_type');
            $table->string('type_carrosserie')->nullable();
            $table->string('date_1er_mise_en');
            $table->string('usage')->nullable();
            $table->unsignedInteger('cylindree')->default(0);
            $table->unsignedInteger('remorques')->default(0);
            $table->unsignedInteger('poids_total_en_charge');
            $table->unsignedInteger('nombre_places');
            $table->timestamps();

            $table->foreign("client_id")
                ->references("id")
                ->on("clients")
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
        Schema::dropIfExists('vehicules');
    }
}
