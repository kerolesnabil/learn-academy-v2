@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>courses /Add new</h6>
        <a href="{{route('admin.courses.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{route('admin.courses.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>select category</label>
            <select class="form-control" name="cat_id">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
             <select class="form-control" name="trainer_id" >
                 @foreach($trainers as $trainer)
                     <option value="{{$trainer->id}}"> {{$trainer->name}} </option>
                 @endforeach
             </select>
         </div>
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" name="name" class="form-control" >
        </div>
        <div class="form-group">
            <lable>small_desc</lable>
            <input type="text" name="small_desc" class="form-control" >
        </div>
        <div class="form-group">
            <lable>desc</lable>
            <textarea name="desc" class="form-control" ></textarea>
        </div>
        <div class="form-group">
            <lable>price</lable>
            <input type="number" name="price" class="form-control" >
        </div>
        <div class="form-group">

            <input type="file" name="img" class="form-control-file" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
