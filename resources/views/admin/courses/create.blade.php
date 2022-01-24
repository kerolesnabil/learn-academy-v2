@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>courses /Add new</h6>
        <a href="{{route('admin.courses.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{route('admin.courses.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id" @if(isset($course->id)) value="{{$course->id}} @endif " >
        <div class="form-group">
            <label>select category</label>
            <select class="form-control" name="cat_id">
                @foreach($cats as $cat)
                    <option  value="{{$cat->id}}" @if(isset($course->cat_id))
                                                            @if($course->cat_id==$cat->id)
                                                                 selected
                                                            @endif
                                                    @endif >{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
             <select class="form-control" name="trainer_id" >
                 @foreach($trainers as $trainer)
                     <option value="{{$trainer->id}}" @if(isset($course->trainer_id))
                                                            @if($course->trainer_id==$trainer->id)
                                                                selected
                                                            @endif
                                                        @endif >
                         {{$trainer->name}} </option>
                 @endforeach
             </select>
         </div>
        <div class="form-group">
            <lable>Name</lable>
            <input type="text"  name="name" @if(isset($course->name))value="{{$course->name}}" @endif class="form-control" >
        </div>
        <div class="form-group">
            <lable>small_desc</lable>
            <input type="text" name="small_desc" @if(isset($course->small_desc))value="{{$course->small_desc}}" @endif class="form-control" >
        </div>
        <div class="form-group">
            <lable>desc</lable>
            <textarea name="desc"   class="form-control" >@if(isset($course->desc)){{$course->price}}@endif</textarea>
        </div>
        <div class="form-group">
            <lable>price</lable>
            <input type="number" @if(isset($course->price))value="{{$course->price}}" @endif  name="price" class="form-control" >
        </div>
        @if(isset($course->img))
            <img class="mt-2 mb-2" src="{{asset('uploads/courses/'.$course->img)}}" height="50px" >
        @endif
        <div class="form-group">

            <input type="file" name="img" class="form-control-file" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
