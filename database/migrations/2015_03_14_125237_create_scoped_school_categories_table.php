<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScopedSchoolCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoped_school_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scoped_school_type_id');
            $table->integer('school_id');
            $table->string('name');
            $table->string('display_name');
            $table->text('meta');
            $table->timestamps();

            $table->unique(['school_id','scoped_school_type_id','name'],'id_school_school_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scoped_school_categories');
    }

}
