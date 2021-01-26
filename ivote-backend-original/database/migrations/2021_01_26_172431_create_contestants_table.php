<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('house')->nullable();
            $table->string('current_class')->nullable();
            $table->string('programme')->nullable();
            $table->string('image_url')->nullable();
            $table->string('group');
            $table->string('group_name')->nullable();
            $table->integer('votes')->nullable()->default('0');
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
        Schema::dropIfExists('contestants');
    }
}
