@extends('layout')
{{-- this basically means that this blade template will be able to be embedded inside the layout blade template --}}

@section('title', 'About Us')
{{-- this embeds the 'About Us' into the @yield --}}
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1>About Us</h1>
        </div>

        <div class="mt-8  dark:bg-gray-800 overflow-hidden  ">
            <p>This is the about page.</p>

        </div>


    </div>
@endsection
{{-- This section means that the blade engine takes note of this part of code so as to include it somewhere else. --}}
