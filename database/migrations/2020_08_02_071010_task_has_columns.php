<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskHasColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('columns', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
        });
    }
}
