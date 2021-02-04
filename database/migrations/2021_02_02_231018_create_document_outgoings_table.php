<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentOutgoingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_outgoings', function (Blueprint $table) {
            $table->id();
            // Порядковый номер документа
            $table->integer('number')->nullable();
            // Год документа
            $table->year('year')->nullable();
            // Дата регистрации
            $table->date('registration_date')->nullable();
            // Количество листов
            $table->integer('sheets')->default(0);
            // Корреспондент
            $table->bigInteger('correspondent_id')->unsigned()->index()->nullable();
            $table->foreign('correspondent_id')->references('id')->on('document_correspondents');
            // Содержание
            $table->text('content')->nullable();
            // Исполнитель
            $table->bigInteger('executor_id')->unsigned()->index()->nullable();
            $table->foreign('executor_id')->references('id')->on('users');
            // Дата создания, изменения
            $table->timestamps();
            // Отметка об удалении
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
        Schema::dropIfExists('document_outgoings');
    }
}
