@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


        <div>
            <h3>
                {{ $guitar['name'] }}
            </h3>
            <ul>
                <li>
                    Made by: {{ $guitar['brand'] }}
                </li>
                <li>
                    Year Made: {{ $guitar['year_made'] }}
                </li>
            </ul>

            <a href="{{ route('guitars.edit', ['guitar' => $guitar['id']]) }}"><button class="btn">Edit
                    {{ $guitar['name'] }}</button></a>

        </div>


    </div>
@endsection
