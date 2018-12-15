<?php

use Illuminate\Database\Seeder;
use App\Models\PlanHasSchedule;

class PlanHasSchedulesTableSeeder extends Seeder
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
        		"plan_id"=>1,
        		"schedule_id"=>1,
        	],
        	[
        		"plan_id"=>2,
        		"schedule_id"=>1,
        	],
        	[
        		"plan_id"=>2,
        		"schedule_id"=>2,
        	],
        	[
        		"plan_id"=>3,
        		"schedule_id"=>1,
        	],
        	[
        		"plan_id"=>3,
        		"schedule_id"=>2,
        	],
        	[
        		"plan_id"=>3,
        		"schedule_id"=>3,
        	]
        ];
        PlanHasSchedule::insert($data);
    }
}
