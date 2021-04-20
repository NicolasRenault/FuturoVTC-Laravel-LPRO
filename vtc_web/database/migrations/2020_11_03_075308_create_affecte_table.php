<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffecteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affecte', function (Blueprint $table) {
            $table->foreignId("idEmploye");
            $table->foreignId("idTransaction");
            $table->string("idVehicule", 9);

            $table->primary(['idEmploye', 'idTransaction', 'idVehicule'], "empVehTransaction");

            $table->foreign("idEmploye")->references("idEmploye")->on("employe")->onUpdate("cascade");
            $table->foreign("idVehicule")->references("idVehicule")->on("vehicule")->onUpdate("cascade");
            $table->foreign("idTransaction")->references("idTransaction")->on("transaction")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affecte');
    }
}
