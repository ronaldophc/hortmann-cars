@extends('layouts.admin')
@section('content')
    <section class="py-4 relative">
        <div class="w-full max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center max-lg:gap-4 justify-between w-full">
                <ul class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-12">
                    <li class="flex items-center cursor-pointer outline-none group">
                        <span class="font-normal text-lg leading-8 text-indigo-600 ml-2 mr-3 transition-all duration-500 group-hover:text-indigo-600">
                            Carros
                        </span>
                        <button
                            class="flex aspect-square h-6 rounded-full border border-indigo-600  items-center justify-center font-manrope font-medium text-base text-indigo-600  transition-all duration-500 group-hover:border-indigo-600 group-hover:text-indigo-600">
                            8
                        </button>
                    </li>

                    <li class="flex items-center cursor-pointer outline-none group">
                        <span class="font-normal text-lg leading-8 text-black pl-2 pr-3 transition-all duration-500 group-hover:text-indigo-600">
                            Motos
                        </span>
                        <span
                            class="w-6 h-6 rounded-full border border-gray-900 flex items-center justify-center font-manrope font-medium text-base text-gray-900 transition-all duration-500 group-hover:border-indigo-600 group-hover:text-indigo-600">3</span>
                    </li>

                </ul>
                <div class="relative w-full max-w-sm">
                    <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-50" width="20" height="20"
                         viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
                            stroke="black" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <select id="Offer"
                            class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
                        <option selected>Sort by (high to low)</option>
                        <option value="option 1">option 1</option>
                        <option value="option 2">option 2</option>
                        <option value="option 3">option 3</option>
                        <option value="option 4">option 4</option>
                    </select>
                    <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-50" width="16" height="16"
                         viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <svg class="my-7 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
                 fill="none">
                <path d="M0 1H1216" stroke="#E5E7EB" />
            </svg>

        </div>
    </section>

@endSection


