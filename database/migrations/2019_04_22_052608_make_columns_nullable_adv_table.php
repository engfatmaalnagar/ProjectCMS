<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeColumnsNullableAdvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advs', function (Blueprint $table) {
            $table->string('url')->nullable()->change();
            $table->string('photo')->nullable()->change();
            $table->string('code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advs', function (Blueprint $table) {
        });
    }
}
