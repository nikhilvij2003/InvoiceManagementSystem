<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        /* General Styles */
        body {
            color: white;
            font-family: sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header & Footer */
        header, footer {
            /* Add styles as needed */
            color:black
        }
        .h1{
            color:black;
            
        }

        /* Main Content Styles */
        .flex-grow {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .text-center {
            text-align: center;
        }

        .mb-12 {
            margin-bottom: 3rem;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .font-bold {
            font-weight: 700;
            color:black;
        }

        .md\:text-5xl {
            font-size: 3rem;
        }

        .animate-fade-in-down {
            animation: fadeInDown 1s ease-out;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .md\:text-xl {
            font-size: 1.25rem;
        }

        .text-gray-200 {
            color: #e5e7eb;
        }

        .flex {
            display: flex;
        }

        .md\:flex-row {
            flex-direction: row;
        }

        .gap-8 {
            gap: 2rem;
        }

        .hidden {
            display: none;
        }

        .md\:block {
            display: block;
        }

        .md\:mr-6 {
            margin-right: 1.5rem;
        }

        .w-48 {
            width: 12rem;
        }

        .md\:w-64 {
            width: 16rem;
        }

        .animate-bounce {
            animation: bounce 1s infinite;
        }

        .flex-col {
            flex-direction: column;
        }

        .md\:flex-row {
            flex-direction: row;
        }

        .gap-4 {
            gap: 1rem;
        }

        .items-center {
            align-items: center;
        }

        .bg-blue-600 {
            background-color: #2563eb;
        }

        .hover\:bg-blue-800:hover {
            background-color: #1e40af;
        }

        .bg-green-600 {
            background-color: #16a34a;
        }

        .hover\:bg-green-800:hover {
            background-color: #15803d;
        }

        .text-white {
            color: white;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .transition-transform {
            transition: transform 0.3s ease;
        }

        .transform {
            transform: translate(0, 0);
        }

        .hover\:-translate-y-1:hover {
            transform: translateY(-0.25rem);
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        /* Success Message */
        .mt-8 {
            margin-top: 2rem;
        }

        .bg-green-500 {
            background-color: #22c55e;
        }

        .text-white {
            color: white;
        }

        .p-4 {
            padding: 1rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-0.25rem);
            }
        }

    </style>
</head>

<body>

    @include('header')

    <div class="flex-grow">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold md:text-5xl mb-4 ">Welcome to SSDN</h1>
            <p class="text-lg md:text-xl text-gray-200">Manage and create bills with ease</p>
        </div>

        <div class="flex flex-col md:flex-row gap-8 items-center">
            <!-- <div class="hidden md:block md:mr-6">
                <img src="https://i.pinimg.com/originals/46/71/c6/4671c6bfaa611757647e91a3aca2ba4f.gif" alt="Bouncing Image" class="animate-bounce w-48 md:w-64">
            </div> -->
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <a href="{{ route('existing-bills') }}"
                    class="bg-blue-600 hover:bg-blue-800 text-white px-8 py-4 rounded-md shadow-lg transition-transform transform hover:-translate-y-1 hover:scale-105 duration-300">
                    View Existing Bills
                </a>
                <a href="{{ route('new-bill') }}"
                    class="bg-green-600 hover:bg-green-800 text-white px-8 py-4 rounded-md shadow-lg transition-transform transform hover:-translate-y-1 hover:scale-105 duration-300">
                    Create New Bill
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mt-8 bg-green-500 text-white p-4 rounded-md shadow-md">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>

    @include('footer')

</body>

</html>
