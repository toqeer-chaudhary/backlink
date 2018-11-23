<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertCategory();
    }

    public function insertCategory()
    {

        Category::insert([
            'id' => 1,
            'user_id' => 1,
            'name' => "Tourism",
            'created_at' => now(),
            'updated_at' => null,
        ]);

        Category::insert([
            'id' => 2,
            'user_id' => 1,
            'name' => "Technology",
            'created_at' => now(),
            'updated_at' => null,
        ]);

        Category::insert([
            'id' => 3,
            'user_id' => 1,
            'name' => "Cars",
            'created_at' => now(),
            'updated_at' => null,
        ]);

        Category::insert([
            'id' => 4,
            'user_id' => 1,
            'name' => "Social Media",
            'created_at' => now(),
            'updated_at' => null,
        ]);
    }
}
