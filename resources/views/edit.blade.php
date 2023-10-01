@extends('layouts.app')
@section('Page Title', 'Archive')
@section('content')
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>

    @endforeach
</ul>
@endif


<div class="input-container">
        <form action="{{route('car.update', ['car' => $cars->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="input-group">
                <div>
                    <label for="brand">Brand</label>
                </div>
                <input type="text" name="brand" id="brand" placeholder="Brand Name" value="{{$cars->brand}}">
            </div>
            <div class="input-group">
                <div>
                    <label for="model">Model</label>
                </div>
                <input type="text" name="model" id="model" placeholder="Model" value="{{$cars->model}}">
            </div>
            <div class="input-group">
                <div>
                    <label for="color">Color</label>
                </div>

                <input type="text" name="color" id="color" placeholder="Color" value="{{$cars->color}}">
            </div>
            <div class="input-group">
                <div>
                    <label for="price">Price</label>
                </div>
                <input type="text" name="price" id="price" placeholder="Price" value="{{$cars->price}}">
            </div>
            <button>Update Car</button>
        </form>

</div>
@endsection