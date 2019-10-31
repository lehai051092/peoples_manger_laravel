@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('peoples.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name"
                   @if($errors->has('name'))
                   style="border: solid red"
                   @endif
            >
            @if($errors->has('name'))
                <p class="text-danger">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/warning-shield.png"> {{$errors->first('name')}}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="abc@abc.com">
            @if($errors->has('email'))
                <p class="text-danger"><img
                        src="https://img.icons8.com/cute-clipart/64/000000/warning-shield.png"> {{$errors->first('email')}}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="form-group">
            <label>Country</label>
            <select class="form-control" name="country">
                <option>Hà Nội</option>
                <option>Bắc Ninh</option>
                <option>TP HCM</option>
                <option>Đà Nẵng</option>
                <option>Huế</option>
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        @foreach($regions as $region)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$region->id}}" name="region">
                <label class="form-check-label" for="{{$region->id}}">
                    {{$region->region_Name}}
                </label>
            </div>
        @endforeach
        <div class="form-group">
            <button type="submit">Create</button>
        </div>
    </form>
@endsection
