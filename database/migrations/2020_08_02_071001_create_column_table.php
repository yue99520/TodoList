<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            //type options
            $table->boolean('boolean')->nullable();
            $table->string('text')->nullable();
            $table->timestamp('time')->nullable();
            $table->float('number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columnables');
    }
}
