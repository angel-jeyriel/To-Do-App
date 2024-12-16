@extends('welcome')
@section('title', 'Sign Up')

@section('content')

<div class="md:container md:mx-auto px-4 row justify-content-center font-sans">
    <div class="col-12 col-sm-8 col-md-6">
        <form class="form mt-5" method="post">
            @csrf
            <h2 class="text-center text-dark text-2xl">Sign Up</h2>
            <div class="form-group">
                <label for="name" class="text-dark">Username:</label><br>
                <input type="text" name="name" id="name"
                    class="block w-full rounded-md border border-purple-500 bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('name')
            <span class=" d-block fs-6 italic text-red-500 mt-2"> {{ $message }} </span>
            @enderror

            <div class="form-group mt-3">
                <label for="email" class="text-dark">Email:</label><br>
                <input type="email" name="email" id="email"
                    class="block w-full rounded-md border border-purple-500 bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('email')
            <span class=" d-block fs-6 italic text-red-500 mt-2"> {{ $message }} </span>
            @enderror

            <div class="form-group mt-3">
                <label for="password" class="text-dark">Password:</label><br>
                <input type="password" name="password" id="password"
                    class="block w-full rounded-md border border-purple-500 bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('password')
            <span class="d-block fs-6 italic text-red-500 mt-2"> {{ $message }} </span>
            @enderror

            <div class="form-group mt-3">
                <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                <input type="password" name="password_confirmation" id="confirm-password"
                    class="block w-full rounded-md border border-purple-500 bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            @error('password_confirmation')
            <span class="d-block fs-6 italic text-red-500 mt-2"> {{ $message }} </span>
            @enderror

            <div class="form-group mt-4">

                <button wire:click.prevent="signin" type="submit"
                    class="mt-2 px-5 py-3 bg-purple-600 text-white font-semibold rounded hover:bg-purple-700 btn btn-dark btn-bg">Sign
                    Up</button>
            </div>
            <div class="form-group mt-3">
                <a href="/login"
                    class="px-2 py-2 bg-transpsrent text-purple-500 border-solid border-2 border-purple-500 font-semibold rounded hover:bg-purple-400 hover:text-white btn btn-dark btn-sm">Login
                    here</a>
            </div>

        </form>
    </div>
</div>
@endsection