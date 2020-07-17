<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetBureauInventaireTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_bureau_inventaire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id');
            $table->integer('bureau_id');
            $table->integer('inventaire_id');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('asset_bureau_inventaire');
    }
}
