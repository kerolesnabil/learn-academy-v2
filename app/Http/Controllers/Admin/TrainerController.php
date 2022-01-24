<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Trainer;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class TrainerController extends Controller
{

    public function index()
    {
        $data['trainers']=Trainer::select('id','name','phone','spec','img')->orderBy('id','DESC')->get();

        return view('admin.trainers.index')->with($data);
    }

    public function create()
    {
        return view('admin.trainers.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'spec'=>'required|string',
            'phone'=>'nullable|string',
            'img'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $new_name=$data['img']->hashName();

        Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
        $data['img']=$new_name;
        Trainer::create($data);

        return redirect(route('admin.trainers.index'));

    }

    public function edit($id)
    {
        $data['trainer']=Trainer::findOrFail($id);
        return view('admin.trainers.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'spec'=>'required|string',
            'phone'=>'nullable|string',
            'img'=>'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $old_name=Trainer::findOrFail($request->id)->img;
        if($request->hasFile('img'))
        {

            Storage::disk('uploads')->delete('trainers/'.$old_name);
            $new_name=$data['img']->hashName();
            Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
            $data['img']=$new_name;

        }
        else{
            $data['img']=$old_name;
        }

        Trainer::findOrFail($request->id)->update($data);
        return back();
    }

    public function delete($id)
    {
        $old_name=Trainer::findOrFail($id)->img;
        Storage::disk('uploads')->delete('trainers/'.$old_name);
        Trainer::findOrFail($id)->delete();

        return back();



    }




}
