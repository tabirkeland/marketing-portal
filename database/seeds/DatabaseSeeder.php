<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name'		=>	'Taylor',
    		'email'		=>	'tabirkeland@gmail.com',
    		'password'	=>	Hash::make('tab220')
    	]);
    }
}
