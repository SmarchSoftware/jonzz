<?php

namespace Smarch\Jonzz\Seeds;

use Illuminate\Database\Seeder;

use DB;

class JonzzTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add resources to insert here
        $resources = [
        	[
        		'name' => 'Standard',
				'slug' => 'base',
				'notes'=> 'The starting point of all damage types',
				'value'=> 1
	        ],
        	[
        		'name' => 'Critical',
				'slug' => 'crit',
				'notes'=> 'Is normally worth extra damage. Maybe add a modifier to this one.',
				'value'=> 1
	        ],
        	[
        		'name' => 'Brutal',
				'slug' => 'brutal',
				'notes'=> 'Oh! Brutal damage!',
				'value'=> 1
	        ],
        	[
        		'name' => 'Frost',
				'slug' => 'light.cold',
				'notes'=> 'Not enabled. For a bit of extra damage over base damage.',
				'value'=> 0
	        ]];
        
        // insert resources
        DB::table( config('jonzz.table','attributes') )->insert($resources);
    }
}
