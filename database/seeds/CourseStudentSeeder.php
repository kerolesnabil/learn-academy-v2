<?php

use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1;$i<=20;$i++)
        {
            \Illuminate\Support\Facades\DB::table('course_student')->insert([
                'course_id'=>rand(1,18),
                'student_id'=>rand(1,20),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }


    }
}
