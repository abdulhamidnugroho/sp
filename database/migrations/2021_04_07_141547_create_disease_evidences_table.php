<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id')->nullable()->constrained('diseases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('evidence_id')->nullable()->constrained('evidences')->onUpdate('cascade')->onDelete('cascade');
            $table->float('cf_rule');
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
        Schema::dropIfExists('disease_evidences');
    }
}
