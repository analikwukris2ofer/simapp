@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <form class="form bg-white p-6 border-1" method="POST" action="{{ route('guitars.store') }}">
            @csrf
            <div>
                <label class="text-sm" for="guitar-name">Guitar Name</label>
                <input class="text-lg border-1" type="text" id="guitar-name" value="{{ old('guitar-name') }}"
                    name="guitar-name">
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
                <input class="text-lg border-1" type="text" id="brand" value="{{ old('brand') }}" name="brand">
                @error('brand')
                    <div class="form-error">
                        {{ $message }}
                        {{-- this message is default and inbuilt into laravel to output the error message from form --}}
                    </div>
                @enderror
            </div>
            <div>
                <label class="text-sm" for="year">Year Made</label>
                <input class="text-lg border-1" type="text" id="year" value="{{ old('year') }}" name="year">
                @error('year')
                    <div class="form-error">
                        {{ $message }}
                        {{-- this message is default and inbuilt into laravel to output the error message from form --}}
                    </div>
                @enderror
            </div>
            <div>
                <button class="border-1" type="submit">Submit</button>
            </div>
        </form>

        {{-- a hacker can forge a request and change something on the server called a cross site
        request forgery. Thus we need a special form field. which is why we added the csrf at the top --}}
    </div>
@endsection
