<?php

use App\Miskonsepsi;
use Illuminate\Database\Seeder;

class JenisMiskonsepsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
            Miskonsepsi::create([
                'jenis'=> 'M'.$i
            ]);
        }
    }
}
