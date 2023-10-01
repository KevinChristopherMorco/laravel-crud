@extends('layouts.app')
@section('Page Title', 'Archive')
@section('content')
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

                <td>
                    <form action="{{route('car.restore', ['car'=> $car->id])}}" method="POST">
                        @csrf
                        <button><i class="fa-solid fa-rotate-right"></i></button>
                    </form>
                </td>
                <td>
                    <form action="{{route('car.destroy', ['car'=> $car->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button><i class="fa-regular fa-trash-can"></i></button>
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