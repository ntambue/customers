<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedInteger('city_id');
            $table->foreign('city_id', 'city_fk_1893738')->references('id')->on('cities');
            $table->unsignedInteger('state_id');
            $table->foreign('state_id', 'state_fk_1893792')->references('id')->on('states');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id', 'country_fk_1893793')->references('id')->on('countries');
            $table->unsignedInteger('department_id');
            $table->foreign('department_id', 'department_fk_1893797')->references('id')->on('departments');
        });
    }
}
