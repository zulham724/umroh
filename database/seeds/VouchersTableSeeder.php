<?php

use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VouchersTableSeeder extends Seeder
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
        		"name"=>"UMR100K",
        		"description"=>"Voucher UMR Premium Rp. 100.000",
        		"value"=>100000,
        		"valid_from"=>"2019-02-21",
        		"valid_until"=>"2019-03-21"
        	],
        	[
        		"name"=>"UMR300K",
        		"description"=>"Voucher UMR Complete Rp. 300.000",
        		"value"=>300000,
        		"valid_from"=>"2019-02-21",
                "valid_until"=>"2019-03-21"
        	],
        	[
        		"name"=>"UMR500K",
        		"description"=>"Voucher UMR Complete Rp. 500.000",
        		"value"=>500000,
        		"valid_from"=>"2019-02-21",
                "valid_until"=>"2019-03-21"
        	],
        ];
        Voucher::insert($data);
    }
}
