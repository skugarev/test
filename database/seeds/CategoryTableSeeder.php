<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Category;

/**
 * Class CategoryTableSeeder
 */
class CategoryTableSeeder extends Seeder
{

    /**
     * @var array
     */
    private $seederData = [
        [
            'name' => 'test1'
        ],
        [
            'name' => 'test2'
        ],
        [
            'name' => 'test3'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Category::insert($this->seederData);
    }
}
