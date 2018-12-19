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
        		"name"=>"transfer BNI"
        	],
        	[
        		"name"=>"transfer BCA"
        	],
        	[
        		"name"=>"transfer Mandiri"
        	],
        ];

        Payment::insert($data);
    }
}
