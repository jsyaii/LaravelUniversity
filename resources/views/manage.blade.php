<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student Data</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://laravel.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('laravel-university-high-resolution-logo-transparent.png') }}" class="h-8" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/home" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="/manage" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-red-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Manage</a>
                    </li>
                    <li>
                        <a href="/search" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Users</h1>
        @if ($changed_name)
        <p class="text-green-600 font-semibold">hahah i changed your name to Bob :P {{ $admin_id }}</p>
        @endif

        @if ($delete_name)
        <p class="text-red-600 font-semibold">YAGAAA you got deleted mr/mrs: {{ $delete_id }}</p>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">First Name</th>
                    <th class="border border-gray-300 px-4 py-2">Last Name</th>
                    <th class="border border-gray-300 px-4 py-2">Age</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Edit</th>
                    <th class="border border-gray-300 px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->first_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->last_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->age }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $record->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="/manage/editName/{{ $record->id }}" class="text-blue-500 hover:underline" id="edit-button">Edit</a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="/manage/deleteRecord/{{ $record->id }}" class="text-red-500 hover:underline">Delete Record</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border border-gray-300 px-4 py-2">No user records found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="/manage/showForm"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button></a>


        @if ($show_create)

        <h2 class="text-2xl font-bold mt-6">Create a user</h2>
        <form action="/manage/create" method="post" class="mt-4">
            @csrf
            <label for="first_name" class="block mb-2">First Name:</label>
            <input type="text" name="first_name" class="w-full border border-gray-300 px-4 py-2 mb-2">

            <label for="last_name" class="block mb-2">Last Name:</label>
            <input type="text" name="last_name" class="w-full border border-gray-300 px-4 py-2 mb-2">

            <label for="age" class="block mb-2">Age:</label>
            <input type="text" name="age" class="w-full border border-gray-300 px-4 py-2 mb-2">

            <label for="email" class="block mb-2">Email:</label>
            <input type="text" name="email" class="w-full border border-gray-300 px-4 py-2 mb-2">

            <input type="submit" value="Submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        </form>
        @endif

        @if ($show_edit_form)
        <h2 class="text-2xl font-bold mt-6">Edit User Name</h2>
        <form action="{{ URL::current() }}" method="post" class="mt-4">
            @csrf

            <label for="new_name" class="block mb-2">New Name:</label>
            <input type="text" name="new_name" class="w-full border border-gray-300 px-4 py-2 mb-2">
            <label for="new_lastname" class="block mb-2">New Last Name:</label>
            <input type="text" name="new_lastname" class="w-full border border-gray-300 px-4 py-2 mb-2">
            <label for="new_age" class="block mb-2">New Age:</label>
            <input type="text" name="new_age" class="w-full border border-gray-300 px-4 py-2 mb-2">
            <label for="new_age" class="block mb-2">New Email:</label>
            <input type="text" name="new_email" class="w-full border border-gray-300 px-4 py-2 mb-2">
            <input type="submit" value="Update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        </form>
        @endif
    </div>

</body>

</html>