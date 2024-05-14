<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://laravel.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="laravel-university-high-resolution-logo-transparent.png" class="h-8" alt="Flowbite Logo" />
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
                        <a href="/manage" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Manage</a>
                    </li>
                    <li>
                        <a href="/search" class="block py-2 px-3 text-red-300 rounded md:bg-transparent md:text-red-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center" style="background-image: url('https://images.pexels.com/photos/159490/yale-university-landscape-universities-schools-159490.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); height: 400px">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <h1 class="mb-4 text-5xl font-semibold">Search student records</h1>
                    <br>
                    <input type="text" name="userInput" class="w-64 h-10 px-4 py-2 bg-black border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter your search query...">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container m-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">First Name</th>
                    <th class="border border-gray-300 px-4 py-2">Last Name</th>
                    <th class="border border-gray-300 px-4 py-2">Age</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="userInput"]');
            const tableBody = document.querySelector('tbody');

            function fetchStudents(userInput) {
                fetch('/search', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // more for just stopping potential attacks
                        },
                        body: JSON.stringify({
                            userInput: userInput
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = '';

                        data.forEach(record => {
                            tableBody.innerHTML += `
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">${record.first_name}</td>
                            <td class="border border-gray-300 px-4 py-2">${record.last_name}</td>
                            <td class="border border-gray-300 px-4 py-2">${record.age}</td>
                            <td class="border border-gray-300 px-4 py-2">${record.email}</td>
                        </tr>
                    `;
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            searchInput.addEventListener('input', function() {
                const userInput = searchInput.value.trim();
                if (userInput.length > 0) {
                    fetchStudents(userInput);
                } else {
                    fetchStudents('');
                }
            });
            fetchStudents('');
        });
    </script>










</body>

</html>