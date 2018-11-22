<?php declare(strict_types=1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class IngredientsTable
 */
class IngredientsTable extends Seeder
{
    const TABLE_NAME= 'ingredients';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::TABLE_NAME)->insert(['name' =>'sale']);
        DB::table(self::TABLE_NAME)->insert(['name' =>'olio']);
        DB::table(self::TABLE_NAME)->insert(['name' =>'pepe']);
        DB::table(self::TABLE_NAME)->insert(['name' =>'anice stellato']);
        DB::table(self::TABLE_NAME)->insert(['name' =>'cumino']);
    }
}
