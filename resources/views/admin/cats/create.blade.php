@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h6>Categories /Add new</h6>
        <a href="{{route('admin.cats.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    @include('admin.inc.errors')
    <form action="{{route('admin.cats.store')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
            <lable>Name</lable>
            <input type="text" name="name" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
