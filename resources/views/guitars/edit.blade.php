@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form class="form bg-white p-6 border-1" method="POST"
            action="{{ route('guitars.update', ['guitar' => $guitar->id]) }}">
            {{-- PUT requests are for updating data however browsers do not understand the PUT --}}
            @csrf
            @method('PUT')
            <div>
                <label class="text-sm" for="name">Guitar Name</label>
                <input class="text-lg border-1" type="text" id="name" value="{{ $guitar->name }}" name="name">
                {{-- the old attribute takes the 'name' value as input so as to preserve the previous input of the user --}}
                @error('guitar-name')
                    <div class="form-error">
                        {{ $message }}
                        {{-- this message is default and inbuilt into laravel to output the error message from form --}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="text-sm" for="brand">Brand</label>
                <input class="text-lg border-1" type="text" id="brand" value="{{ $guitar->brand }}" name="brand">
                @error('brand')
                    <div class="form-error">
                        {{ $message }}
                        {{-- this message is default and inbuilt into laravel to output the error message from form --}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="text-sm" for="year_made">Year Made</label>
                <input class="text-lg border-1" type="text" id="year_made" value="{{ $guitar->year_made }}"
                    name="year_made">
                {{-- The value attribute is being received from the database through the id being passed in. --}}
                @error('year')
                    <div class="form-error">
                        {{ $message }}
                        {{-- this message is default and inbuilt into laravel to output the error message from form --}}
                    </div>
                @enderror
            </div>
            <div>
                <button class="border-1 btn" type="submit">Submit</button>
            </div>
        </form>

        {{-- a hacker can forge a request and change something on the server called a cross site
        request forgery. Thus we need a special form field. which is why we added the csrf at the top --}}
    </div>
@endsection
