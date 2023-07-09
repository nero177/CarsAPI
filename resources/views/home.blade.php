@extends('layouts.app')
@section('content')
    <div class="max-w mx-10 mb-10">
        <div class="flex flex-col">
            <h1 class="text-3xl fond-bold text-center py-5">Cars API</h1>
            <div class="flex mb-3 mt-2 justify-between">
                <form action="{{ route('index') }}" class="rounded-md shadow-sm flex my-0">
                    <input type="text" name="search" placeholder="Search"
                        class="block rounded-md border py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <button type="submit" class="bg-indigo-600 text-white rounded-md px-2 ml-3">Search</button>
                </form>

                <div class="buttons flex">

                    <a href="/api/cars" id="xlsLink"
                        class="inline-flex items-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Export XLS
                    </a>


                    <button type="button" data-modal-id="1"
                        class="open-modal inline-flex items-center rounded-md bg-indigo-600 ml-2 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add new
                    </button>
                </div>

            </div>

        </div>

        <x-modal :id="1">
            <x-slot:modal_content>
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Owner name</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="name"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Number</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="number"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="vin_code" class="block text-sm font-medium leading-6 text-gray-900">Vin code</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="vin_code"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="color"
                                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="py-3 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-md bg-indigo-600  px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 sm:ml-3 sm:w-auto">Add</button>
                        <button type="button" data-modal-id="1"
                            class="close-modal mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </form>
                
                </x-slot>
        </x-modal>

        <div class="flex flex-col">
            <div class="overflow-x-auto border-solid border rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y table-fixed">
                            <thead class="bg-white">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Name
                                        <a href="?name[sort]=asc">↑</a>
                                        <a href="?name[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Number
                                        <a href="?number[sort]=asc">↑</a>
                                        <a href="?number[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Color
                                        <a href="?color[sort]=asc">↑</a>
                                        <a href="?color[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Vin code
                                        <a href="?vin_code[sort]=asc">↑</a>
                                        <a href="?vin_code[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Mark
                                        <a href="?mark[sort]=asc">↑</a>
                                        <a href="?mark[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Model
                                        <a href="?model[sort]=asc">↑</a>
                                        <a href="?model[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-bold tracking-wider text-left text-black">
                                        Year
                                        <a href="?year[sort]=asc">↑</a>
                                        <a href="?year[sort]=desc">↓</a>
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y">
                                @foreach ($cars as $car)
                                    <tr class="hover:bg-gray-200">
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap">{{ $car->name }}</td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->number }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->color }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->vin_code }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->mark }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->model }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-gray-700 whitespace-nowrap">{{ $car->year }}
                                        </td>
                                        <td class="py-4 px-6 text-sm text-right whitespace-nowrap flex">
                                            <a href="{{ route('edit', $car->id) }}"
                                                class="text-blue-600 hover:underline mr-3">Edit</a>
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" width="24px" height="20px"
                                                        fill="#AA0000">
                                                        <path
                                                            d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" />
                                                    </svg></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#"
                            class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{ $currentPage }}</span>
                                to
                                <span class="font-medium">{{ $lastPage }}</span>
                                of
                                <span class="font-medium">{{ $carsCount }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                @foreach ($pagination as $i => $page)
                                    @if ($i === 0)
                                        <a href="{{ $page->url }}"
                                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                            <span class="sr-only">Previous</span>
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @elseif($i === count($pagination) - 1)
                                        <a href="{{ $page->url }}"
                                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                            <span class="sr-only">Next</span>
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ $page->url }}" aria-current="page"
                                            class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-black focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">{{ $page->label }}</a>
                                    @endif
                                @endforeach

                                {{-- <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span> --}}

                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
