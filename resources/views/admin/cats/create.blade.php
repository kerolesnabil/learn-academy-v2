@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Categories @if (isset($cat->name)) {{$cat->name}}  @else /Add new @endif</h6>
        <a href="{{route('admin.cats.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{route('admin.cats.store')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
            <input type="hidden" name="id" @if (isset($cat->id)) value="{{$cat->id}}" @endif  >
            <lable>Name</lable>
            <input type="text" @if (isset($cat->name)) value="{{$cat->name}}" @endif  name="name" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
