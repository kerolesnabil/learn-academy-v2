@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Categories / Edit /{{$cat->name}}</h6>
        <a href="{{route('admin.cats.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form method="post" action="{{route('admin.cats.update')}}" >
        {{csrf_field()}}
        <div class="form-group">
            <lable>Name</lable>
            <input type="hidden" name="id" value="{{$cat->id}}" >
            <input type="text" name="name" class="form-control" value="{{$cat->name}}" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
