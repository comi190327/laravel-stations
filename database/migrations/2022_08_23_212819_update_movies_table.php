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
        Schema::table('movies', function (Blueprint $table) {
            $table->Integer('published_year')->comment('公開年');
            $table->tinyInteger('is_showing')->default('0')->comment('上映中かどうか');
            $table->text('description')->comment('概要');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            Schema::dropColumn('description', 'is_showing', 'published_year', 'published_year');
        });
    }
};
