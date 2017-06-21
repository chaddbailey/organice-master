<?php

use Illuminate\Database\Seeder;

class ServicetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicetype =[[
        'service_id' => 1,
    	'type' => 'Catering Services'
    	],
    	[
    	'service_id' => 2,
    	'type' => 'Equipment Services'
    	],
    	[
    	'service_id' => 3,
    	'type' => 'Manpower Services'
    	],
    	[
    	'service_id' => 4,
    	'type' => 'Printing/Giveaway Services'
    	],
    	[
    	'service_id' => 5,
    	'type' => 'Videograph/Photograph Services'
    	],
    	[
    	'service_id' => 6,
    	'type' => 'Flower Services'
    	],
        [
        'service_id' => 7,
        'type' => 'Entertainment Services'
        ],
        [
        'service_id' => 8,
        'type' => 'Cake and Pastry'
        ],
        [
        'service_id' => 9,
        'type' => 'Wine and Beverage'
        ],
        [
        'service_id' => 10,
        'type' => 'Styling Services'
        ],
        [
        'service_id' => 11,
        'type' => 'Tailoring and Designer Services'
        ],
        [
        'service_id' => 12,
        'type' => 'Bridal Car Services'
        ]
    	];
        DB::table('servicetype')->insert($servicetype);
    }
}
