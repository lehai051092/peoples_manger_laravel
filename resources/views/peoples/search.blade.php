@extends('layouts.app')
@section('content')
    <table class="table table-sm">
        <thead>
        <form enctype="multipart/form-data">
            <tr>
                <td><input type="text" name="search"></td>
                <td><button type="submit" class="btn btn-primary">Search</button></td>
            </tr>
        </form>
        <tr>
            <td><a href="{{route('peoples.add')}}" class="btn btn-primary">Insert</a></td>
        </tr>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Age</th>
            <th scope="col">Country</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        @foreach($dataSearch as $key => $people)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$people->name}}</td>
                <td>{{$people->email}}</td>
                <td>{{$people->age}}</td>
                <td>{{$people->country}}</td>
                <td><img src="{{asset('storage/images/'.$people->image)}}" width="50" height="40"></td>
                <td><a href="{{route('peoples.delete', $people->id)}}" onclick="return confirm('Are you delete {{$people->name}} ?')">DELETE</a></td>
                <td><a href="{{route('peoples.edit', $people->id)}}">EDIT</a></td>
            </tr>
        @endforeach
        <tbody>
    </table>
    {{$dataSearch->links()}}
@endsection
