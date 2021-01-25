<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->year('year')->nullable();

            $table->date('registered_at');
            $table->date('planned_at')->nullable();
            $table->date('executed_at')->nullable();

            $table->text('content')->nullable();

            $table->text('resolution')->nullable();

            $table->bigInteger('journal_id')->unsigned()->index()->nullable();
            $table->foreign('journal_id')->references('id')->on('journals');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
