<?php

use Illuminate\Database\Seeder;
use App\Character;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	Character::insert($this->values());
    }

    private function values(){
    	return [
    		[
    			'name' => 'Doutor Manhattan',
    			'description' => 'Arma nuclear ambulante',
    			'image' => 'doutor-manhattan.png',
    			'like' => rand(1,100),
    			'unlike' => rand(1,100),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')


    		],
    		[
    			'name' => 'Comediante',
    			'description' => 'Mercenário do governo',
    			'image' => 'comediante.png',
    			'like' => rand(1,100),
    			'unlike' => rand(1,100),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')


    		],
    		[
    			'name' => 'Ozymandias',
    			'description' => 'Mega empresário',
    			'image' => 'ozymandias.png',
    			'like' => rand(1,100),
    			'unlike' => rand(1,100),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')


    		],
    		[
    			'name' => 'Rorshack',
    			'description' => 'Herói Sociopata',
    			'image' => 'rorshack.png',
    			'like' => rand(1,100),
    			'unlike' => rand(1,100),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')


    		],
    		[
    			'name' => 'Coruja',
    			'description' => 'Vigilante Noturno',
    			'image' => 'coruja.png',
    			'like' => rand(1,100),
    			'unlike' => rand(1,100),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')


    		]
    	];
    }
}

