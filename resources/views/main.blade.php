@extends('layouts.app')
@section('content')
    <h1>This is the main page</h1>
    {{-- Three columns --}}
    <div class="flex gap-4 m-4">
        <div class="col-md-4">
            <h2>Column 1</h2>
            <img class="w-48" src="{{ asset('images/stationery_green.jpg') }}" alt="">
        </div>
        <div class="col-md-4">
            <h2>Column 2</h2>
            <img class="w-48" src="{{ asset('images/stationery.jpg') }}" alt="">
        </div>
        <div class="col-md-4">
            <h2>Column 3</h2>
            <img class="w-48" src="{{ asset('images/note_pencil.jpg') }}" alt="">
        </div>
    </div>
@endsection
