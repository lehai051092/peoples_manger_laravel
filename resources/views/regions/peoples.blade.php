@extends('layouts.app')
@section('content')
    <form method="get" enctype="multipart/form-data">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Country</th>
                <th scope="col">Region</th>
                <th scope="col">Image</th>
            </tr>


            </thead>
            @foreach($peoples as $key => $people)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$people->name}}</td>
                    <td>{{$people->email}}</td>
                    <td>{{$people->age}}</td>
                    <td>{{$people->country}}</td>
                    <td></td>
                    <td><img src="{{asset('storage/images/'.$people->image)}}" width="50" height="40"></td>
                </tr>
            @endforeach

        </table>
    </form>
@endsection
