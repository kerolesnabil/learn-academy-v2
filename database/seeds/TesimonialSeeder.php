<?php

use Illuminate\Database\Seeder;

class TesimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Tesimonial::class,3)->create();
    }
}
