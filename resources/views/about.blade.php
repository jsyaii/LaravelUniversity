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
                        <a href="/about" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-red-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">About</a>
                    </li>
                    <li>
                        <a href="/manage" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Manage</a>
                    </li>
                    <li>
                        <a href="/search" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container m-auto">
        <div class="flex">
            <div class="w-1/5 bg-red-900 p-8 h-100 flex flex-col justify-between rounded-lg shadow-lg mt-14">
                <div class="mb-8">
                    <h2 class="text-lg font-semibold mb-2 text-white">Contact IT Support</h2>
                    <p class="text-white">Email: support@laraveluniversity.com</p>
                    <br>
                    <img src="https://images.pexels.com/photos/7709178/pexels-photo-7709178.jpeg?auto=compress&cs=tinysrgb&w=800" alt="IT Support Image" class="w-full">
                </div>
            </div>
            <div class="py-16 bg-white">
                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                    <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                        <div class="md:5/12 lg:w-5/12">
                            <img src="https://images.pexels.com/photos/574073/pexels-photo-574073.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="image" loading="lazy" class="w-full h-auto rounded-lg shadow-lg" style="max-width: 100%;">
                        </div>
                        <div class="md:7/12 lg:w-6/12">
                            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">About us</h2>
                            <p class="mt-6 text-gray-600">Our application is designed for managing student records. It provides a convenient platform for storing, organizing, and retrieving information related to students, including their personal details, academic records, and more. With our user-friendly interface and powerful features, administrators can efficiently manage student data, track student progress, and generate reports as needed.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <section class="bg-gray-100 py-12 mt-10 mb-10 shadow-lg rounded-lg">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">What Our Clients Say</h2>
                    <p class="mt-4 text-lg text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-red-900 p-6 rounded-lg shadow-lg">
                        <p class="text-lg text-white">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</p>
                        <div class="mt-4">
                            <h4 class="text-xl font-semibold text-white">John Doe</h4>
                            <p class="text-white">CEO, Company ABC</p>
                        </div>
                    </div>
                    <div class="bg-red-900 p-6 rounded-lg shadow-lg">
                        <p class="text-lg text-white">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</p>
                        <div class="mt-4">
                            <h4 class="text-xl font-semibold text-white">Jane Smith</h4>
                            <p class="text-white">Marketing Head, Company XYZ</p>
                        </div>
                    </div>
                    <div class="bg-red-900 p-6 rounded-lg shadow-lg">
                        <p class="text-lg text-white">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</p>
                        <div class="mt-4">
                            <h4 class="text-xl font-semibold text-white">Alice Johnson</h4>
                            <p class="text-white">CTO, Company 123</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>