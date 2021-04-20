<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePossedeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('possede', function (Blueprint $table) {
            $table->string("typePermis", 3);
            $table->foreignId("idEmploye");
            $table->primary(["typePermis", "idEmploye"], "permisEmploye");

            $table->foreign("typePermis")->references("typePermis")->on("permis")->onUpdate("cascade");
            $table->foreign("idEmploye")->references("idEmploye")->on("employe")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('possede');
    }
}
