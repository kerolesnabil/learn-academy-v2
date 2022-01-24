<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Message;
use App\NewsLetter;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function newsletter(Request $request)
    {
        if($request->ajax())
        {
            $data=$request->validate([
                'email'=>'required|email'
            ]);

            NewsLetter::create($data);
            return response(['status'=>true]);
        }

    }

    public function contact(Request $request)
    {
        if($request->ajax())
        {
            $data=$request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'subject'=>'nullable|string',
                'message'=>'required|string',
            ]);


            Message::create($data);
            return response(['status'=>true]);
        }
    }
    public function enroll(Request $request)
    {

        if($request->ajax()) {
            $data = $request->validate([
                'name' => 'nullable|string',
                'email' => 'required|email',
                'spec' => 'nullable|string',
                'course_id' => 'required|exists:courses,id',

            ]);


            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'spec' => $data['spec'],
            ]);
            $student_id = $student->id;

            DB::table('course_student')->insert([
                'course_id' => $data['course_id'],
                'student_id' => $student_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response(['status'=>true]);
        }


        return back();
    }

}
