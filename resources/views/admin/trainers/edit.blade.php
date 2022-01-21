@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Trainer / Edit /{{$trainer->name}}</h6>
        <a href="{{route('admin.trainers.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form method="post" action="{{route('admin.trainers.update')}}" enctype="multipart/form-data" >
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$trainer->id}}" >
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" name="name" class="form-control" value="{{$trainer->name}}" >
        </div>
            <div class="form-group">

                <lable>phone</lable>
                <input type="text" name="phone" value="{{$trainer->phone}}" class="form-control" >
            </div>
            <div class="form-group">
                <lable>speciality</lable>
                <input type="text" name="spec" value="{{$trainer->spec}}" class="form-control" >
            </div>
            <img class="mt-2 mb-2" src="{{asset('uploads/trainers/'.$trainer->img)}}" height="50px" >

            <div class="form-group">
                <input type="file" name="img" class="form-control-file" >
            </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
