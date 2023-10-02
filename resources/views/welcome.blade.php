@extends('layouts.app')

@section('content')

@if(session('register'))
<div class="message-container message-container-register">
    <div>
        <p><i class="fa-regular fa-circle-check"></i> Car added to the list</p>
    </div>
</div>
@endif

@if(session('edit'))
<div class="message-container message-container-edit">
    <div>
        <p><i class="fa-regular fa-circle-check"></i> Car data successfully modified</p>
    </div>
</div>
@endif

@if(session('archive'))
<div class="message-container message-container-archive">
    <div>
        <p><i class="fa-solid fa-circle-exclamation"></i> Car data transferred to archive</p>
    </div>
</div>
@endif



@if(session('restore'))
<div class="message-container message-container-restore">
    <div>
        <p><i class="fa-regular fa-circle-check"></i> Car data restored to the list</p>
    </div>
</div>
@endif

<h1 class="table-label">List of Cars</h1>
<div class="link-button-container">
    <a class="link-button" href="{{route('car.register')}}"><i class="fa-solid fa-circle-plus"></i> Register Car</a>
    <a class="link-button" href="{{route('car.archive')}}"><i class="fa-solid fa-box-open"></i> Archive</a>
</div>
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
                        <a href="{{route('car.edit', ['car'=> $car->id])}}"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{route('car.destroy', ['car'=> $car->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button><i class="fa-solid fa-box-archive"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5"><h4><i class="fa-solid fa-circle-exclamation"></i> No car record found</h4></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection