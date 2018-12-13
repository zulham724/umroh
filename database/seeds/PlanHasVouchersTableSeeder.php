<?php

use Illuminate\Database\Seeder;
use App\Models\PlanHasVoucher;

class PlanHasVouchersTableSeeder extends Seeder
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
        		"plan_id"=>2,
        		"voucher_id"=>1
        	],
        	[
        		"plan_id"=>3,
        		"voucher_id"=>2
        	],
        	[
        		"plan_id"=>3,
        		"voucher_id"=>3
        	],
        ];

        PlanHasVoucher::insert($data);
    }
}
