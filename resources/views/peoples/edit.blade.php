@extends('layouts.app')
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{route('peoples.update', $people->id)}}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$people->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="abc@abc.com" value="{{$people->email}}">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age" value="{{$people->age}}">
        </div>
        <div class="form-group">
            <label >Country</label>
            <select class="form-control" name="country">
                <option @if($people->country=="Hà Nội") selected @endif>Hà Nội</option>
                <option  @if($people->country=="Bắc Ninh") selected @endif>Bắc Ninh</option>
                <option @if($people->country=="TP HCM") selected @endif>TP HCM</option>
                <option @if($people->country=="Đà Nẵng") selected @endif>Đà Nẵng</option>
                <option @if($people->country=="Huế") selected @endif>Huế</option>
            </select>
        </div>
        <div class="form-group">
            <label>Image OLD</label>
            <img src="{{asset('storage/images/'.$people->image)}}" width="50" height="40">
            <label>Image NEW</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
