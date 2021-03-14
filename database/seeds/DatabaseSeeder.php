<?php

use App\MiskonsepsiDetail;
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
        $this->call(JenisMiskonsepsiSeeder::class);
        $this->call(MiskonsepsiSeeder::class);
    }
}
