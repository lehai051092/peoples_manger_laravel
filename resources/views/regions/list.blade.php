@extends('layouts.app')
@section('content')
    <form>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
           <tbody>
                @foreach($regions as $key => $region)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><a href="{{route('regions.peoples', $region->id)}}">{{$region->region_Name}}</a></td>
                    </tr>
                    @endforeach
           </tbody>
        </table>
    </form>
@endsection
