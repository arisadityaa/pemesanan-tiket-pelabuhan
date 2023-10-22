<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tickets = [
            [
                'location_id'=> 1,
                'name'=>'Ticket Pelabuhan Banyuwangi - Pelabuhan Sanur',
                'stock'=>10,
                'price'=>20000,
                'description'=>'Occaecat Lorem nulla ut pariatur commodo magna id sit sit tempor ad deserunt et occaecat.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
            [
                'location_id'=> 1,
                'name'=>'Ticket Pelabuhan Banyuwangi - Pelabuhan Ketapang',
                'stock'=>10,
                'price'=>15000,
                'description'=>'Amet eu est irure consequat aute sit voluptate nisi veniam laboris sunt excepteur.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
            [
                'location_id'=> 2,
                'name'=>'Ticket Pelabuhan Ketapang - Pelabuhan Ketapang',
                'stock'=>10,
                'price'=>5000,
                'description'=>'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
            [
                'location_id'=> 2,
                'name'=>'Ticket Pelabuhan Ketapang - Pelabuhan Banyuwangi',
                'stock'=>10,
                'price'=>50000,
                'description'=>'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
            [
                'location_id'=> 3,
                'name'=>'Ticket Pelabuhan Gilimanuk - Pelabuhan Ketapang',
                'stock'=>10,
                'price'=>5000,
                'description'=>'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
            [
                'location_id'=> 3,
                'name'=>'Ticket Pelabuhan Gilimanuk - Pelabuhan Banyuwangi',
                'stock'=>10,
                'price'=>50000,
                'description'=>'Sit cupidatat laborum deserunt enim officia aliqua cupidatat ipsum aliquip quis commodo proident veniam fugiat.',
                'sail_time'=> '2023-10-16 20:31:00',
            ],
        ];
        foreach($tickets as $ticket){
            Ticket::create($ticket);
        }
    }
}
