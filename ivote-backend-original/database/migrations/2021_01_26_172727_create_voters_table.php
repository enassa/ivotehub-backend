<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->integer('row_count')->nullable();
            $table->string('index_number');
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('programme')->nullable();
            $table->string('grade')->nullable();
            $table->string('raw_score')->nullable();
            $table->string('school_attended')->nullable();
            $table->string('rstatus')->nullable();
            $table->string('track_number')->nullable();
            $table->string('vote_status')->nullable();
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
        Schema::dropIfExists('voters');
    }
}
