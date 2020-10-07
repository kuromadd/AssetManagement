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
           // $table->string('code_actif')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('prix'); 
            $table->string('brand'); 
            $table->string('category');
            $table->integer('bureau_id')->nullable();
            $table->date('dateService')->nullable();
            //$table->date('dateAchat')->nullable();
            $table->integer('duree_vie');
            $table->integer('status')->default(0);
            $table->boolean('occupied')->default(0); 
            $table->boolean('etat')->default(1); 
            $table->integer('fournisseur_id')->nullable();  
            $table->string('qrcode')->nullable();      
            $table->boolean('replaced')->nullable();   
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
