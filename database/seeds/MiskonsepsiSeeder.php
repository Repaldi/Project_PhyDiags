<?php

use App\Miskonsepsi;
use App\MiskonsepsiDetail;
use Illuminate\Database\Seeder;

class MiskonsepsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 1,
            'tk_1'  => '1.1 B',
            'tk_2'  => '1.2 A',
            'tk_3'  => '1.3 A',
            'tk_4'  => '1.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 2,
            'tk_1'  => '1.1 A',
            'tk_2'  => '1.2 A',
            'tk_3'  => '1.3 C',
            'tk_4'  => '1.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 3,
            'tk_1'  => '1.1 C',
            'tk_2'  => '1.2 A',
            'tk_3'  => '1.3 B',
            'tk_4'  => '1.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 3,
            'tk_1'  => '2.1 B',
            'tk_2'  => '2.2 A',
            'tk_3'  => '2.3 C',
            'tk_4'  => '2.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 3,
            'tk_1'  => '3.1 C',
            'tk_2'  => '3.2 A',
            'tk_3'  => '3.3 C',
            'tk_4'  => '3.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 4,
            'tk_1'  => '2.1 A',
            'tk_2'  => '2.2 A',
            'tk_3'  => '2.3 B',
            'tk_4'  => '2.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 4,
            'tk_1'  => '2.1 D',
            'tk_2'  => '2.2 A',
            'tk_3'  => '2.3 A',
            'tk_4'  => '2.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 4,
            'tk_1'  => '3.1 B',
            'tk_2'  => '3.2 A',
            'tk_3'  => '3.3 A',
            'tk_4'  => '3.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 4,
            'tk_1'  => '3.1 A',
            'tk_2'  => '3.2 A',
            'tk_3'  => '3.3 A',
            'tk_4'  => '3.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 5,
            'tk_1'  => '4.1 B',
            'tk_2'  => '4.2 A',
            'tk_3'  => '4.3 D',
            'tk_4'  => '4.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 5,
            'tk_1'  => '4.1 D',
            'tk_2'  => '4.2 A',
            'tk_3'  => '4.3 C',
            'tk_4'  => '4.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 6,
            'tk_1'  => '4.1 A',
            'tk_2'  => '4.2 A',
            'tk_3'  => '4.3 A',
            'tk_4'  => '4.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 7,
            'tk_1'  => '5.1 B',
            'tk_2'  => '5.2 A',
            'tk_3'  => '5.3 C',
            'tk_4'  => '5.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 7,
            'tk_1'  => '5.1 A',
            'tk_2'  => '5.2 A',
            'tk_3'  => '5.3 A',
            'tk_4'  => '5.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 8,
            'tk_1'  => '6.1 A',
            'tk_2'  => '6.2 A',
            'tk_3'  => '6.3 D',
            'tk_4'  => '6.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 8,
            'tk_1'  => '6.1 B',
            'tk_2'  => '6.2 A',
            'tk_3'  => '6.3 B',
            'tk_4'  => '6.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 8,
            'tk_1'  => '6.1 C',
            'tk_2'  => '6.2 A',
            'tk_3'  => '6.3 A',
            'tk_4'  => '6.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 9,
            'tk_1'  => '5.1 D',
            'tk_2'  => '5.2 A',
            'tk_3'  => '5.3 B',
            'tk_4'  => '5.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 10,
            'tk_1'  => '7.1 A',
            'tk_2'  => '7.2 A',
            'tk_3'  => '7.3 B',
            'tk_4'  => '7.4 A'
        ]);

        MiskonsepsiDetail::create([
            'miskonsepsi_id' => 10,
            'tk_1'  => '7.1 C',
            'tk_2'  => '7.2 A',
            'tk_3'  => '7.3 D',
            'tk_4'  => '7.4 A'
        ]);

    }
}
