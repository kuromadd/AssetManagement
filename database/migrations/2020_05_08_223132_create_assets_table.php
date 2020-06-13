<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('prix');
            $table->string('category');
            $table->integer('bureau_id')->nullable();
            $table->date('dateService')->nullable();
            $table->string('duree_vie');
            $table->integer('status')->default(0);
            $table->boolean('occupied')->default(0); 
            $table->boolean('etat')->default(0); 
            $table->integer('fournisseur_id')->nullable();           
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
        Schema::dropIfExists('assets');
    }
}
