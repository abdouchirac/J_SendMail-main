<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinataires', function (Blueprint $table) {
            $table->id();
            $table->string('destinataire_noms');
            $table->string('destinataire_prenoms');
            $table->string('destinataire_email');
            $table->integer('destinataire_telephone');
            $table->string('destinataire_pasword');
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
        Schema::dropIfExists('destinataires');
    }
};
