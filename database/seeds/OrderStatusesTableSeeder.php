<?php

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		"id"=>1,
        		"name"=>"Pending",
        		"description"=>"Belum melakukan pembayaran sama sekali"
        	],
        	[
        		"id"=>2,
        		"name"=>"Angsur",
        		"description"=>"Telah melakukan Angsur"
        	],
        	[
        		"id"=>3,
        		"name"=>"Complete",
        		"description"=>"Telah menyelesaikan pembayaran"
        	]
        ];

        OrderStatus::insert($data);
    }
}
