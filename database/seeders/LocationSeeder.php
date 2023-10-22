<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $locations = [
            'Pelabuhan Banyuwangi',
            'Pelabuhan Ketapang',
            'Pelabuhan Gilimanuk',
            'Pelabuhan Benoa',
            'Pelabuhan Sanur',
            'Pelabuhan Madura',
            'Pelabuhan Banyuwangi',
        ];

        foreach($locations as $location){
            Location::create([
                'name'=>$location
            ]);
        }
    }
}
