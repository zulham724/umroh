<?php

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesTableSeeder extends Seeder
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
        		"name"=>"Lion Air",
        		"description"=>"Promotion Flight",
                "type"=>"Economy",
                "capacity"=>100,
                "from"=>"Semarang",
                "to"=>"Singapore",
        		"start_at"=>"2019-03-21",
        		"end_at"=>"2019-04-21"
        	],
        	[
        		"name"=>"Sriwijaya Air",
        		"description"=>"Promotion Flight",
                "type"=>"Economy",
                "capacity"=>200,
                "from"=>"Semarang",
                "to"=>"Singapore",
        		"start_at"=>"2019-04-21",
        		"end_at"=>"2019-05-21"
        	],
        	[
        		"name"=>"Garuda Indonesia",
        		"description"=>"Promotion Flight",
                "type"=>"Economy",
                "capacity"=>300,
                "from"=>"Semarang",
                "to"=>"Singapore",
        		"start_at"=>"2019-05-21",
        		"end_at"=>"2019-06-21"
        	]
        ];
        Schedule::insert($data);
    }
}
