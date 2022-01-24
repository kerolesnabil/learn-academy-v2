@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>trainers /Add new</h6>
        <a href="{{route('admin.trainers.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{route('admin.trainers.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id" @if(isset($trainer->id)) value="{{$trainer->id}}" @endif  >

        <div class="form-group">
            <lable>Name</lable>
            <input type="text" name="name" @if(isset($trainer->name))value="{{$trainer->name}}" @endif class="form-control" >
        </div>
        <div class="form-group">
            <lable>phone</lable>
            <input type="text" name="phone" @if(isset($trainer->phone))value="{{$trainer->phone}}" @endif class="form-control" >
        </div>
        <div class="form-group">
            <lable>speciality</lable>
            <input type="text" name="spec" @if(isset($trainer->spec))value="{{$trainer->spec}}" @endif class="form-control" >
        </div>
        @if(isset($course->img))
            <img class="mt-2 mb-2" src="{{asset('uploads/trainers/'.$trainer->img)}}" height="50px" >
        @endif
        <div class="form-group">

            <input type="file" name="img" class="form-control-file" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
