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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('file');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('document_status_id');
            $table->foreign('document_status_id')->references('id')->on('document_statuses');

            // $table->foreignId('department_id')
            // ->constrained('departments')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

            // $table->foreignId('document_status_id')
            // ->constrained('document_statuses')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

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
        Schema::dropIfExists('documents');
    }
};
