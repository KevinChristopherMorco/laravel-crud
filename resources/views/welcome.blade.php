@extends('layouts.app')

@section('content')
<div class="link-button-container">
    <a class="link-button" href="{{route('car.register')}}"><i class="fa-solid fa-circle-plus"></i> Register Car</a>
    <a class="link-button" href="{{route('car.archive')}}"><i class="fa-solid fa-box-open"></i> Archive</a>
</div>

@if(session('register'))
<div class="message-container message-container-register">
    <div>
        <p>Car added to the list</p>
    </div>
</div>
@endif

@if(session('archive'))
<div class="message-container message-container-archive">
    <div>
        <p>Car data transferred to archive</p>
    </div>
</div>
@endif

@if(session('restore'))
<div class="message-container message-container-restore">
    <div>
        <p>Car data restored to the list</p>
    </div>
</div>
@endif

<div class="table-container">
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)

            <tr>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->color}}</td>
                <td>${{$car->price}}</td>

                <td><a href="{{route('car.edit', ['car'=> $car->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                </td>
                <td>
                    <form action="{{route('car.destroy', ['car'=> $car->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button><i class="fa-solid fa-box-archive"></i></button>
                    </form>
                </td>


            </tr>
            @empty
            <h1>No records found</h1>

            @endforelse
        </tbody>
    </table>
</div>
@endsection