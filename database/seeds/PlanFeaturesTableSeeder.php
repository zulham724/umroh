<?php

use Illuminate\Database\Seeder;
use App\Models\PlanFeature;

class PlanFeaturesTableSeeder extends Seeder
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
        		"name"=>"Food and Drink"
        	],
        	[
        		"plan_id"=>1,
        		"name"=>"Transport"
        	],
            [
                "plan_id"=>2,
                "name"=>"Transport"
            ],
            [
                "plan_id"=>2,
                "name"=>"Food and Drink"
            ],
            [
                "plan_id"=>2,
                "name"=>"Ansurance"
            ],
            [
                "plan_id"=>3,
                "name"=>"Food and Drink"
            ],
            [
                "plan_id"=>3,
                "name"=>"Transport"
            ],
            [
                "plan_id"=>3,
                "name"=>"Ansurance"
            ],
            [
                "plan_id"=>3,
                "name"=>"Hotels"
            ],
        ];

        PlanFeature::insert($data);

    }
}
