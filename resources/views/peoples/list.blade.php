@extends('layouts.app')
@section('content')
    <form action="{{route('peoples.search')}}" method="get" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td><input type="text" name="search">
                    <button type="submit"><img src="https://img.icons8.com/metro/20/000000/search.png"></button>
                </td>
                <td></td>
                <td><a href="{{route('peoples.add')}}"><img src="https://img.icons8.com/bubbles/50/000000/create-new.png"></a></td>
            </tr>
        </table>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Country</th>
                <th scope="col">Region</th>
                <th scope="col" colspan="3">Image</th>
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
                            @if($people->region_id == $region->id)
                                {{$region->region_Name}}
                            @endif
                        @endforeach
                    </td>
                    <td><img src="{{asset('storage/images/'.$people->image)}}" width="50" height="40"></td>
                    <td><a href="{{route('peoples.delete', $people->id)}}"
                           onclick="return confirm('Are you delete {{$people->name}} ?')"><img src="https://img.icons8.com/doodle/48/000000/delete-sign.png"></a>
                    </td>
                    <td><a href="{{route('peoples.edit', $people->id)}}"><img src="https://img.icons8.com/plasticine/48/000000/edit.png"></a></td>
                </tr>
            @endforeach
            <tbody>
        </table>
    </form>
    {{$peoples->links()}}
@endsection
