@extends('admin.layout')

@section('content')

        <div class="d-flex justify-content-between p-3">
            <h3>categories</h3>
            <a href="{{route('admin.trainers.create')}}"  class="btn btn-sm btn-primary">Add new</a>
        </div>

        <table class="table" >
            <thead>
                <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Image</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Phone</th>
                        <th scope="col" >Spec</th>
                        <th scope="col" >Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($trainers as $trainer)
                <tr>
                    <th scope="row">{{$loop->iteration}} </th>
                    <td><img  src="{{asset('uploads/trainers/'.$trainer->img)}}" height="50px" ></td>
                    <td>{{$trainer->name}}</td>
                    <td>
                        @if(!$trainer->phone==null)
                             {{$trainer->phone}}
                        @else
                            No phone
                        @endif()
                    </td>
                    <td>{{$trainer->spec}}</td>
                        <td>
                            <a  class="btn btn-sm btn-info" href="{{route('admin.trainers.edit', $trainer->id)}}" >Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{route('admin.trainers.delete' , $trainer->id)}}" >Delete</a>
                        </td>
                </tr>
            @endforeach

            </tbody>
        </table>


@endsection()
