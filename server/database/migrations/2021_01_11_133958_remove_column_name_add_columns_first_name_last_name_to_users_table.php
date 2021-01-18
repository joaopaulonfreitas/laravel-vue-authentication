<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnNameAddColumnsFirstNameLastNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->string('name')->nullable()->change();
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->string('name')->change();
            $table->string('name')->before('first_name');
            $table->dropColumn('first_name', 'last_name');
        });
    }
}
