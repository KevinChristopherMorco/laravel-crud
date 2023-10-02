@extends('layouts.app')
@section('Page Title', 'Archive')
@section('content')
<div class="home-button-container">
    <a class="home-button" href="{{route('index')}}"><i class="fa-solid fa-house"></i> Home page</a>
</div>
@if(session('delete'))
<div class="message-container message-container-archive">
    <div>
        <p><i class="fa-solid fa-circle-check"></i> Car data deleted</p>
    </div>
</div>
@endif

<h1 class="table-label">Car Archive</h1>

<div class="table-container">
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)

            <tr>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->color}}</td>
                <td>${{$car->price}}</td>
                <td>
                    <div class="action-button-container">
                        <form action="{{route('car.restore', ['car'=> $car->id])}}" method="POST">
                            @csrf
                            <button><i class="fa-solid fa-rotate-right"></i></button>
                        </form>
                        <form action="{{route('car.destroy', ['car'=> $car->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                </td>


            </tr>
            @empty
            <tr>
                <td colspan="5"><h4><i class="fa-solid fa-circle-exclamation"></i> No car found in the archive</h4></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection