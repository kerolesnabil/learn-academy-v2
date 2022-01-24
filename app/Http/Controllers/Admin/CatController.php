<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatController extends Controller
{

    public function index()
    {
        $data['cats']=Cat::select('id','name')->orderBy('id','DESC')->get();

        return view('admin.cats.index')->with($data);
    }

    public function create($id=null)
    {
        if($id!=null)
        {
            $data['cat']=Cat::findOrFail($id);
        }
        return view('admin.cats.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string'
        ]);

        if($request->id!=null)
        {
            Cat::findOrFail($request->id)->update($data);
        }
        else{
            Cat::create($data);
        }

        return redirect(route('admin.cats.index'));

    }

    public function delete($id)
    {
        Cat::findOrFail($id)->delete();

        return back();
    }
}
