<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Course;
use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CourseController extends Controller

{

    public function index()
    {
        $data['courses']=Course::select('id','name','price','img')->orderBy('id','DESC')->get();

        return view('admin.courses.index')->with($data);
    }

    public function create($id=null)
    {
        $data['cats']=Cat::select('id','name')->get();
        $data['trainers']=Trainer::select('id','name')->get();

        if($id!=null)
        {
            $data['course']=Course::findOrFail($id);

        }
        return view('admin.courses.create')->with($data);

    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'small_desc'=>'required|string',
            'desc'=>'required|string',
            'price'=>'required|integer',
            'cat_id'=>'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id',
        ]);

        if($request->id!=null)
        {
            $data+=$request->validate([
                'img'=>'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $old_name=Course::findOrFail($request->id)->img;
            if($request->hasFile('img'))
            {

                Storage::disk('uploads')->delete('courses/'.$old_name);
                $new_name=$data['img']->hashName();
                Image::make($data['img'])->resize(970,520)->save(public_path('uploads/courses/'.$new_name));
                $data['img']=$new_name;

            }
            else{
                $data['img']=$old_name;
            }

            Course::findOrFail($request->id)->update($data);
            return back();
        }
        else{
            $data+=$request->validate([
                'img'=>'required|image|mimes:jpg,jpeg,png'
            ]);
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(970,520)->save(public_path('uploads/courses/'.$new_name));
            $data['img']=$new_name;
            Course::create($data);
        }


        return redirect(route('admin.courses.index'));

    }

    public function delete($id)
    {
        $old_name=Course::findOrFail($id)->img;
        Storage::disk('uploads')->delete('courses/'.$old_name);
        Course::findOrFail($id)->delete();

        return back();
    }
}
