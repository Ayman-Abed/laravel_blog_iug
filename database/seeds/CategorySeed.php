<?php

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            # code...
            App\Category::create([
                'name' => 'category' . $i,
                'slug' => 'category' . $i,
            ]);
        }
    }
}
