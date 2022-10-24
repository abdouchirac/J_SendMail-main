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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('courrier_libele');
            $table->date('courrier_date_arrive');
            $table->string('receptioniste');
            $table->enum('courrier_status', ['enStok', 'enCours', 'destoke']);
            $table->foreignId('emeteur_id')->constrained('emeteurs');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('emplacement_id')->constrained('emplacements');
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
        Schema::dropIfExists('courriers');
    }
};
