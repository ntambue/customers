<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('address');
            $table->string('zip')->nullable();
            $table->string('age');
            $table->date('birthdate');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
