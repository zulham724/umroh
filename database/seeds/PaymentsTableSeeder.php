<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentsTableSeeder extends Seeder
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
        		"name"=>"Bank Transfer"
        	]
        ];

        Payment::insert($data);
    }
}
