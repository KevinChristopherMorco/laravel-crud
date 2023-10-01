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

<form action="{{route('car.store')}}" method="POST">
    @csrf
    <div>
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" placeholder="Brand Name">
    </div>
    <div>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" placeholder="Model">
    </div>
    <div>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" placeholder="Color">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" placeholder="Price">
    </div>
    <button>Register Car</button>
</form>
@endsection