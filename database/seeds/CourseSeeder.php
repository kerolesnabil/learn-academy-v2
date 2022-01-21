<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=3;$i<=3;$i++)
        {
            for ($j=1;$j<=6;$j++)
            {
                Course::create([
                    'cat_id'=>$i,
                    'trainer_id'=>rand(1,5),
                    'name'=>"course num $j num $j",
                    'small_desc'=>'try to answer every question on our support forum. Please leave a note on the forum for any special requests, and we’ll respond ASAP. This section will be updated as more themes become available',
                    'desc'=>'If you get stuck with setup and customization, we are here to help, and we try to answer every question on our support forum. Please leave a note on the forum for any special requests, and we’ll respond ASAP. This section will be updated as more themes become available.If you get stuck with setup and customization, we are here to help, and we try to answer every question on our support forum. Please leave a note on the forum for any special requests, and we’ll respond ASAP. This section will be updated as more themes become available.',
                    'price'=>rand(1000,20000),
                    'img'=>"$i$j.png"
                ]);
            }
        }
    }
}
