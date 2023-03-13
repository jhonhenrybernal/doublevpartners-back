<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::insert([
            [
                "user" => "Christopher Nolan",
                "status" => "abierto",
            ],
            [
                "user" => "Francis Ford Coppola",
                "status" => "abierto",
            ],
            [
                "user" => "Frank Capra",
                "status" => "abierto",
            ],
            [
                "user" => "Bong Joon Ho",
                "status" => "abierto",
            ],
            [
                "user" => "Ridley Scott",
                "status" => "abierto",
            ],
            [
                "user" => "Todd Phillips",
                "status" => "abierto",
            ],
        ]);
    }
}
