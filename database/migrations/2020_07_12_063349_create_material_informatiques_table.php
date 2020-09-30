<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialInformatiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_informatiques', function (Blueprint $table) {
            $table->string('ref')->unique();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->boolean('etat');
            $table->integer('garentie');
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
        Schema::dropIfExists('material_informatiques');
    }
}
