<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zona = [[
            'zona'      =>  'ZONA 1',
            'harga25'   =>  0,
            'harga50'   =>  0,
            'harga100'  =>  0,
            'km'        =>  '0 - 9',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA 2',
            'harga25'   =>  50000,
            'harga50'   =>  70000,
            'harga100'  =>  100000,
            'km'        =>  '10 - 15',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA 3',
            'harga25'   =>  80000,
            'harga50'   =>  120000,
            'harga100'  =>  180000,
            'km'        =>  '16 - 25',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA 4',
            'harga25'   =>  125000,
            'harga50'   =>  200000,
            'harga100'  =>  250000,
            'km'        =>  '26 - 40',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA 5',
            'harga25'   =>  200000,
            'harga50'   =>  300000,
            'harga100'  =>  400000,
            'km'        =>  '41 - 60',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA 6',
            'harga25'   =>  300000,
            'harga50'   =>  400000,
            'harga100'  =>  500000,
            'km'        =>  '61 - 80',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA KHUSUS 1',
            'harga25'   =>  500000,
            'harga50'   =>  600000,
            'harga100'  =>  750000,
            'km'        =>  '81 - 150',
            'created_at' => new \DateTime,
            'updated_at' => null
        ], [
            'zona'      =>  'ZONA KHUSUS 2',
            'harga25'   =>  700000,
            'harga50'   =>  900000,
            'harga100'  =>  1200000,
            'km'        =>  '151 - 220',
            'created_at' => new \DateTime,
            'updated_at' => null
        ]];

        DB::table('zonas')->insert($zona);
    }
}
