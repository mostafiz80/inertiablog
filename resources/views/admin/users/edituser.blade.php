@extends('admin.layouts.app',['title' => 'Admin Home'])


@section('main')
<section class="bg-white dark:bg-gray-500">
    <div class="py-8 px-4 mx-auto max-w-xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
        <form method="POST" action="{{route('users.update', $userdata)}}">
            @csrf
            @method('patch')
            
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$userdata->name}}" required="">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" name="username" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$userdata->username}}" required="">
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $userdata->email }}" required="">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter password" required="">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> 
                <div>
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter confirm password" required="">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div> 

            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Update user
            </button>
        </form>
    </div>
  </section>
    @endsection
