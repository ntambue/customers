<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCitiesTable extends Migration
{
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedInteger('name_id');
            $table->foreign('name_id', 'name_fk_1893673')->references('id')->on('states');
        });
    }
}
