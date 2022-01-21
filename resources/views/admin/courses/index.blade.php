@extends('admin.layout')

@section('content')

        <div class="d-flex justify-content-between p-3">
            <h3>categories</h3>
            <a href="{{route('admin.courses.create')}}"  class="btn btn-sm btn-primary">Add new</a>
        </div>

        <table class="table" >
            <thead>
                <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Image</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Price</th>
                        <th scope="col" >Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$loop->iteration}} </th>
                    <td><img  src="{{asset('uploads/courses/'.$course->img)}}" height="50px" ></td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->price}}</td>
                    <td>
                        <a  class="btn btn-sm btn-info" href="{{route('admin.courses.edit', $course->id)}}" >Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('admin.courses.delete' , $course->id)}}" >Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


@endsection()
