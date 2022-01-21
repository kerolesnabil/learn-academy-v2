<?php

use Illuminate\Database\Seeder;
use App\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name'=>'karemm fouad',
            'spec'=>'web development',
            'img'=>'1.png'
        ]);
        Trainer::create([
            'name'=>'ahmed hazem',
            'spec'=>'web development',
            'img'=>'2.png'
        ]);
        Trainer::create([
            'name'=>'ahmed fouad',
            'spec'=>'doctor',
            'img'=>'3.png'
        ]);
        Trainer::create([
            'name'=>'fouad magdy',
            'spec'=>'dentist',
            'img'=>'4.png'
        ]);
        Trainer::create([
            'name'=>'mohammed mahmoud',
            'spec'=>'englsh teacher',
            'img'=>'5.png'
        ]);
    }
}
