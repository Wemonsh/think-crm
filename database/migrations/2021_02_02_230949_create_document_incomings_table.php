<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentIncomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_incomings', function (Blueprint $table) {
            $table->id();
            // Порядковый номер документа
            $table->integer('number')->nullable();
            // Год документа
            $table->year('year')->nullable();
            // Дата регистрации
            $table->date('registration_date')->nullable();
            // Количество листов
            $table->integer('sheets')->default(0);
            // Дата документа
            $table->date('document_date')->nullable();
            // Корреспондент
            $table->bigInteger('correspondent_id')->unsigned()->index()->nullable();
            $table->foreign('correspondent_id')->references('id')->on('document_correspondents');
            // Тип документа
            $table->bigInteger('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('document_types');
            // Тип важности
            $table->bigInteger('importance_id')->unsigned()->index()->nullable();
            $table->foreign('importance_id')->references('id')->on('document_importances');
            // Содержание
            $table->text('content')->nullable();
            // Куратор
            $table->bigInteger('curator_id')->unsigned()->index()->nullable();
            $table->foreign('curator_id')->references('id')->on('users');
            // Дата резолюции
            $table->date('resolution_date')->nullable();
            // Резолюция
            $table->text('resolution')->nullable();
            // Исполнитель
            $table->bigInteger('executor_id')->unsigned()->index()->nullable();
            $table->foreign('executor_id')->references('id')->on('users');
            // Планируемый срок исполнения
            $table->date('planned_date')->nullable();
            // Дата фактического исполнение
            $table->date('due_date')->nullable();
            // Отметка об исполнении
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('document_incomings');
    }
}
