@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('peoples.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="abc@abc.com">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
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
        <div class="form-group">
           <button type="submit">Create</button>
        </div>
    </form>
@endsection
