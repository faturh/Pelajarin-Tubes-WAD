<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Skill Learning | Classic Learning Theme</title>
    <style>
        /* Global Styling */
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f9f9fc;
            color: #2c3e50;
            line-height: 1.6;
        }

        nav {
            background: linear-gradient(90deg, #457b9d, #1d3557);
            color: #f1faee;
        }

        a {
            text-decoration: none;
        }

        h1,
        h2 {
            font-family: 'Georgia', serif;
            font-weight: bold;
        }

        h1 {
            color: #1d3557;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        h2 {
            color: #457b9d;
            font-size: 1.3rem;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #457b9d;
            color: #f1faee;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #1d3557;
            color: #a8dadc;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        footer {
            background: #1d3557;
            color: #f1faee;
            padding: 1rem 0;
            text-align: center;
        }

        .profile-dropdown {
            position: absolute;
            right: 0;
            z-index: 10;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <div class="flex-grow">
        <!-- Navigation -->
        <nav class="shadow-md">
            <div class="container mx-auto flex justify-between items-center px-4 py-4">
                <div class="flex items-center">
                    <img class="h-10" src="/storage/General/pelajarinlogo.png" alt="Pelajarin Logo">
                    <div class="ml-8 space-x-4 hidden md:flex">
                        <a href="main" class="text-lg font-semibold text-yellow-400">Skill-Learning</a>
                        <a href="elearn" class="text-lg hover:text-yellow-400">E-Learning</a>
                        <a href="jobseaker" class="text-lg hover:text-yellow-400">Jobseaker</a>
                    </div>
                </div>
                <!-- Profile Section -->
                <div class="hidden md:flex items-center" x-data="{ isOpen: false }">
                    <div class="relative ml-3">
                        <button @click="isOpen = !isOpen" type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_picture ? asset('storage/profile_pictures/' . auth()->user()->profile_picture) : asset('default-avatar.png') }}" alt="User Avatar">
                        </button>
                        <!-- Dropdown -->
                        <div x-show="isOpen"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5">
                            <a href="yourprofile" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <h1 class="text-left">Explore Skill Learning Opportunities</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                @foreach ($courses as $course)
                <div class="card">
                    <img src="{{ asset('storage/' . $course->Image) }}" alt="{{ $course->Title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold">{{ $course->Title }}</h2>
                        <p class="text-sm text-gray-500">Publisher: {{ $course->Publisher }}</p>
                        <p class="text-sm text-gray-700 mt-2">{{ Str::limit($course->Description, 100) }}</p>
                        <a href="{{ $course->Link }}" target="_blank" class="btn mt-4">Learn More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pelajarin. All Rights Reserved.</p>
    </footer>
</body>

</html>
