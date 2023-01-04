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
        Schema::table('comentario_software', function (Blueprint $table) {
            //Relacion
            //Un usuario puede tener muchos comentarios y un comentarios le pertenece a un usuario.
            $table->unsignedBigInteger('user_id')->after('id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            //Relacion
            $table->unsignedBigInteger('carreras_id')->after('id')->nullable();

            $table->foreign('carreras_id')
                ->references('id')
                ->on('carreras')
                ->onDelete('cascade');

            //Relacion
            $table->unsignedBigInteger('semestres_id')->after('id')->nullable();

            $table->foreign('semestres_id')
                ->references('id')
                ->on('semestres')
                ->onDelete('cascade');

             //Relacion
            $table->unsignedBigInteger('materias_id')->after('id')->nullable();

            $table->foreign('materias_id')
                ->references('id')
                ->on('materias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentario_software', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['carreras_id']);
            $table->dropForeign(['semestres_id']);
            $table->dropForeign(['materias_id']);
            //
        });
    }
};
