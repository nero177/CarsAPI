@extends('layouts.app')
@section('content')
    <div class="max-w mx-10 mb-10">
        <div class="flex flex-col">
            <h1 class="text-3xl fond-bold text-center py-5">Cars API</h1>
        </div>

        <a href="/" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 sm:w-auto"><- Back</a>

         <form action="{{ route('cars.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Owner name</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="name" value="{{$name}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Number</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="number" value="{{$number}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="vin_code" class="block text-sm font-medium leading-6 text-gray-900">Vin code</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="vin_code" value="{{$vin_code}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="color" value="{{$color}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Mark</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="mark" value="{{$mark}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                     <div class="mt-2">
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Model</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="model" value="{{$model}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                     <div class="mt-2">
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Year</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="year" value="{{$year}}"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="py-3 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 sm:ml-3 sm:w-auto">Save</button>
                    </div>
                </form>
    </div>
@endsection
