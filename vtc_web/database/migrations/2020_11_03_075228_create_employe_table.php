<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe', function (Blueprint $table) {
            $table->id("idEmploye");
            $table->string("matricule", 10)->unique();
            $table->string("nomEmploye", 50);
            $table->string("prenomEmploye", 50);
            $table->string("typeRole", 5);

            $table->foreign("typeRole")->references("typeRole")->on("role")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe');
    }
}
