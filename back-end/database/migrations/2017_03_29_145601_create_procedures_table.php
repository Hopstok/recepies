<?php declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProceduresTable.
 */
class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {

            $table->engine  = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation   = 'utf8_general_ci';

            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->longText('step');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();

            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}
