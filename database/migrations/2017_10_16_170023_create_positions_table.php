<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class CreatePositionsTable extends Migration
{
    private $schema;
    
    public function __construct()
    {
        $this->schema = app(Builder::class);
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('positions', function (Blueprint $table) {
            $table->increments('position_id');
            $table->string('name', 50)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('positions');
    }
}
