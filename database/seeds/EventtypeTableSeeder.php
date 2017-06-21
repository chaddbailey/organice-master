<?php

use Illuminate\Database\Seeder;

class EventtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event =[[
        'event_id' => 1,
        'type' => ' '
        ],
        [
        'event_id' => 2,
    	'type' => 'Wedding'
    	],
    	[
    	'event_id' => 3,
    	'type' => 'Birthday'
    	],
    	[
    	'event_id' => 4,
    	'type' => 'Wedding Anniversary'
    	],
    	[
    	'event_id' => 5,
    	'type' => 'Town Fiesta'
    	],
    	[
    	'event_id' => 6,
    	'type' => 'Christening'
    	],
    	[
    	'event_id' => 7,
    	'type' => 'Thanksgiving'
    	],
        [
        'event_id' => 8,
        'type' => 'Debut'
        ],
        [
        'event_id' => 9,
        'type' => 'Baby Shower'
        ],
        [
        'event_id' => 10,
        'type' => 'Bridal Shower'
        ],
        [
        'event_id' => 11,
        'type' => 'Founders Day Celebration'
        ],
        [
        'event_id' => 12,
        'type' => 'Fashion Show'
        ],
        [
        'event_id' => 13,
        'type' => 'Death Anniversary'
        ],
        [
        'event_id' => 14,
        'type' => 'Graduation'
        ],
        [
        'event_id' => 15,
        'type' => 'Simple Celebration'
        ]
    	];
        DB::table('event')->insert($event);
    }
}
