<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionStatus;

class TransactionStatusesTableSeeder extends Seeder
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
        		"description"=>"Belum melakukan transaksi"
        	],
        	[
                "id"=>2,
        		"name"=>"Complete",
        		"description"=>"Telah menyelesaikan pembayaran"
        	],
        ];

        TransactionStatus::insert($data);
    }
}
