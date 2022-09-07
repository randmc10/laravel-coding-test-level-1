<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Assessment</title>

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>

    <div class="relative bg-white shadow-lg">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div
                class="flex items-center justify-between border-b-2 border-gray-100 py-3 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="#">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto sm:h-10"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="-my-2 -mr-2 md:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/bars-3 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <nav class="hidden space-x-10 md:flex">
                    <a href="/" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Dashboard</a>
                    <a href="/events" class="text-base font-medium text-gray-500 hover:text-gray-900">Events</a>
                    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Contact</a>
                </nav>
                <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                    <a href="/login"
                        class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Login</a>
                    <a href="/register"
                        class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border bordetransparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Register</a>
                </div>
            </div>
        </div>
    </div>
