<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function(Blueprint $table)
        {
            $table->renameColumn('name', 'house_name');
        });

        Schema::table('images', function(Blueprint $table)
        {
            $table->renameColumn('id', 'image_id');
        });

        Schema::table('object_types', function(Blueprint $table)
        {
            $table->renameColumn('name', 'object_type_name');
        });

        Schema::table('populated_places', function(Blueprint $table)
        {
            $table->renameColumn('name', 'populated_place_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function(Blueprint $table)
        {
            $table->renameColumn('name', 'house_name');
            $table->renameColumn('id', 'house_id');
        });

        Schema::table('images', function(Blueprint $table)
        {
            $table->renameColumn('id', 'image_id');
        });

        Schema::table('object_types', function(Blueprint $table)
        {
            $table->renameColumn('name', 'object_type_name');
        });

        Schema::table('populated_places', function(Blueprint $table)
        {
            $table->renameColumn('name', 'populated_place_name');
        });
    }
}
