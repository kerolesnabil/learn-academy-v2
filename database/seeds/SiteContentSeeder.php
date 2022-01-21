<?php

use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\SiteContent::create([
//           'name'=>'banner',
//           'content'=>json_encode([
//               'title'=>'EVERY STUdENT YEARNS TO LEARN',
//               'subtitle'=>'EVERY student YEARNS TO LEARN Making Your Childs World Better',
//               'desc'=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"
//           ]),
//        ]);

        \App\SiteContent::create([
           'name'=>'courses',
           'content'=>json_encode([
               'title'=>'our courses',
               'subtitle'=>'different Categories',
           ]),
        ]);
    }
}
