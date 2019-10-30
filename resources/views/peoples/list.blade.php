@extends('layouts.app')
@section('content')
    <form action="{{route('peoples.search')}}" method="get" enctype="multipart/form-data">
        @csrf
        <table class="table table-sm">
            <thead>
            <tr>
                <td><input type="text" name="search"></td>
                <td>
                    <button type="submit" class="btn btn-primary">Search</button>
                </td>
            </tr>
            <tr>
                <td><a href="{{route('peoples.add')}}" class="btn btn-primary">Insert</a></td>
            </tr>
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
                    <td>
                    @foreach($regions as $region)
                        @if($people->region_id == $region->region_id)
                            {{$region->region_Name}}
                        @endif
                    @endforeach
                    </td>
                    <td><img src="{{asset('storage/images/'.$people->image)}}" width="50" height="40"></td>
                    <td><a href="{{route('peoples.delete', $people->id)}}"
                           onclick="return confirm('Are you delete {{$people->name}} ?')" class="btn btn-secondary">DELETE</a>
                    </td>
                    <td><a href="{{route('peoples.edit', $people->id)}}" class="btn btn-secondary">EDIT</a></td>
                </tr>
            @endforeach
            <tbody>
        </table>
    </form>
    {{$peoples->links()}}
@endsection
