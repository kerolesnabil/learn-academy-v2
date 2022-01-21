<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\SiteContent;
use App\Student;
use App\Tesimonial;
use App\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected function index()
    {
        $data['courses']=Course::select('id','name','small_desc','cat_id','trainer_id','img','price')->orderBy('id','desc')->take(3)->get();

        $data['banner']=SiteContent::select('content')->where('name','banner')->first();
        $data['courses_content']=SiteContent::select('content')->where('name','courses')->first();

        $data['courses_count']=Course::count();
        $data['trainers_count']=Trainer::count();
        $data['students_count']=Student::count();

        $data['tesimonials']=Tesimonial::select('name','spec','desc','img')->get();

        return view('front.index')->with($data);


    }
}
