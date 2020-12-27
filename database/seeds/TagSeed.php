<?php

use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 14; $i++) {
            # code...
            App\Tag::create([
                'name' => 'tag ' . $i,
            ]);
        }
    }
}
