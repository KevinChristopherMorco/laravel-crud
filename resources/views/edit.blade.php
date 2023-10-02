@extends('layouts.app')
@section('Page Title', 'Edit Car')
@section('content')
<div class="home-button-container">
<a class="home-button" href="{{route('index')}}"><i class="fa-solid fa-house"></i> Home page</a>
</div>

<h1 class="table-label">Modify {{$cars->brand}} {{$cars->model}}'s Information</h1>
<div class="input-container">
    <form action="{{route('car.update', ['car' => $cars->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="input-group-container">
            <div class="input-group">
                <div class="label-container">
                    <label for="brand">Brand</label>
                </div>
                <input type="text" name="brand" id="brand" placeholder="Brand Name" value="{{$cars->brand}}">
                <div class="error-container">
                    @error('brand')
                    <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="input-group">
                <div class="label-container">
                    <label for="model">Model</label>
                </div>
                <input type="text" name="model" id="model" placeholder="Model" value="{{$cars->model}}">
                <div class="error-container">
                    @error('model')
                    <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="input-group-container">
            <div class="input-group">
                <div class="label-container">
                    <label for="color">Color</label>
                </div>
                <input type="text" name="color" id="color" placeholder="Color" value="{{$cars->color}}">
                <div class="error-container">
                    @error('color')
                    <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="input-group">
                <div class="label-container">
                    <label for="price">Price</label>
                </div>
                <input type="text" name="price" id="price" placeholder="Price" value="{{$cars->price}}">
                <div class="error-container">
                    @error('price')
                    <div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="button-container">
            <button>Update Car</button>
        </div>
    </form>
</div>
@endsection