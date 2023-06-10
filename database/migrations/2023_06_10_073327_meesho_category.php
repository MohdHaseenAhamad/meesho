<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MeeshoCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    var $_prefix = 'meesho_';
    public function up()
    {
        Schema::create($this->_prefix.'category', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name', 100);
            $table->string('cat_slug', 100)->nullable();
            $table->integer('cat_status')->default(0);
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
        Schema::dropIfExists($this->_prefix.'category');
    }
}
