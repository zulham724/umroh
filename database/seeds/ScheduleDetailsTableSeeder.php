<?php

use Illuminate\Database\Seeder;
use App\Models\ScheduleDetail;

class ScheduleDetailsTableSeeder extends Seeder
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
        		"schedule_id"=>1,
        		"name"=>"Semarang",
        		"description"=>"Persiapan dan Inap Hotel",
        		"start_at"=>"2019-03-22",
        		"end_at"=>"2019-03-25"
        	],
        	[
        		"schedule_id"=>1,
        		"name"=>"Jakarta",
        		"description"=>"Wisata Basic",
        		"start_at"=>"2019-03-25",
        		"end_at"=>"2019-04-15"
        	],
        	[
        		"schedule_id"=>1,
        		"name"=>"Singapura",
        		"description"=>"Wisata Utama",
        		"start_at"=>"2019-04-15",
        		"end_at"=>"2019-04-21"
        	],
        	[
        		"schedule_id"=>2,
        		"name"=>"Semarang",
        		"description"=>"Persiapan dan Inap Hotel",
        		"start_at"=>"2019-04-22",
        		"end_at"=>"2019-04-25"
        	],
        	[
        		"schedule_id"=>2,
        		"name"=>"Jakarta",
        		"description"=>"Wisata Kota",
        		"start_at"=>"2019-05-25",
        		"end_at"=>"2019-05-15"
        	],
        	[
        		"schedule_id"=>2,
        		"name"=>"Singapura",
        		"description"=>"Wisata Utama",
        		"start_at"=>"2019-05-15",
        		"end_at"=>"2019-05-21"
        	],
        	[
        		"schedule_id"=>3,
        		"name"=>"Semarang",
        		"description"=>"Persiapan dan Inap Hotel",
        		"start_at"=>"2019-05-22",
        		"end_at"=>"2019-05-25"
        	],
        	[
        		"schedule_id"=>3,
        		"name"=>"Jakarta",
        		"description"=>"Wisata Kota",
        		"start_at"=>"2019-05-25",
        		"end_at"=>"2019-06-15"
        	],
        	[
        		"schedule_id"=>3,
        		"name"=>"Singapura",
        		"description"=>"Wisata Utama",
        		"start_at"=>"2019-06-15",
        		"end_at"=>"2019-06-21"
        	]
        ];
        ScheduleDetail::insert($data);
    }
}
