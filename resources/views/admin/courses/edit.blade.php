@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Course / Edit /{{$course->name}}</h6>
        <a href="{{route('admin.courses.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form method="post" action="{{route('admin.courses.update')}}" enctype="multipart/form-data" >
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$course->id}}" >
        <div class="form-group">

            <select class="form-control" name="cat_id">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}" @if($course->cat_id==$cat->id) selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="trainer_id" >
                @foreach($trainers as $trainer)
                    <option value="{{$trainer->id}}" @if($course->trainer_id==$trainer->id) selected @endif> {{$trainer->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" name="name" value="{{$course->name}}" class="form-control" >
        </div>
        <div class="form-group">
            <lable>small_desc</lable>
            <input type="text" name="small_desc" value="{{$course->small_desc}}" class="form-control" >
        </div>
        <div class="form-group">
            <lable>desc</lable>
            <textarea name="desc" class="form-control" >{{$course->desc}}</textarea>
        </div>
        <div class="form-group">
            <lable>price</lable>
            <input type="number" name="price" value="{{$course->price}}" class="form-control" >
        </div>
        <img class="mt-2 mb-2" src="{{asset('uploads/courses/'.$course->img)}}" height="50px" >
        <div class="form-group">
            <input type="file" name="img" class="form-control-file" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
