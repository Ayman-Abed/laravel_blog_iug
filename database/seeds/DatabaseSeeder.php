<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeed::class);
        $this->call(CategorySeed::class);
        $this->call(TagSeed::class);
        $this->call(PostSeed::class);
    }
}
