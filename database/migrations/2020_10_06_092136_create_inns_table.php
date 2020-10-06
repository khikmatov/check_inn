<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inns', function (Blueprint $table) {
            $table->id();
            $table->string('inn')->nullable(false);
            $table->string('checkingDate')->nullable(false);
            $table->boolean('isSelfEmployed')->nullable(false)->default(false);
            $table->boolean('resStatus')->nullable(false)->default(false);
            $table->string('resCode')->nullable(true);
            $table->string('resMessage')->nullable(true);
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
        Schema::dropIfExists('inns');
    }
}
