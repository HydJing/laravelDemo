@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rouded-lg">
            <form action="{{ route('register') }}" method="POST">
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rouded-lg" value="">
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rouded-lg" value="">
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rouded-lg" value="">
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="text" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rouded-lg" value="">
                </div>

                <div class="mb-4">
                    <label for="password_confirm" class="sr-only">Password Confirm</label>
                    <input type="text" name="password_confirm" id="password_confirm" placeholder="Your confirm password" class="bg-gray-100 border-2 w-full p-4 rouded-lg" value="">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rouded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection