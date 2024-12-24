<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module">
        import { twind, setup } from 'https://cdn.jsdelivr.net/npm/twind@0.16.16/twind.min.js';
        setup({
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF',
                        secondary: '#9333EA',
                    },
                },
            },
        });
    </script>
    <title>Enhanced Dashboard</title>
</head>
<body class="bg-gradient-to-r from-gray-50 to-gray-100">
<div class="min-h-full">
  <!-- Navigation Bar -->
  <nav class="bg-gradient-to-r from-gray-800 via-gray-900 to-black" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="h-10" src="/storage/General/pelajarinlogo.png" alt="Logo">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="main" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:scale-105 transition transform active:scale-95">Skill-Learning</a>
              <a href="elearn" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition transform active:scale-95">E-Learning</a>
              <a href="jobseaker" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition transform active:scale-95">Jobseaker</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition transform active:scale-95">Reports</a>
            </div>
          </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="relative ml-3">
              <div>
                <button @click="isOpen = !isOpen" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-haspopup="true">
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
              </div>
              <div x-show="isOpen" x-transition:enter="transition ease-out duration-150 transform" x-transition:leave="transition ease-in duration-100 transform" class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu">
                <a href="yourprofile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="-mr-2 flex md:hidden">
          <button @click="isOpen = !isOpen" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none">
            <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" class="md:hidden">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <a href="main" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white transform active:scale-95">Skill-Learning</a>
        <a href="elearn" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transform active:scale-95">E-Learning</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transform active:scale-95">Projects</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transform active:scale-95">Calendar</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transform active:scale-95">Reports</a>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold">Dashboard</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h2 class="text-2xl font-semibold mb-4">E-Learning</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($courses as $course)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transform transition-transform active:scale-95">
          <img src="{{ asset('storage/' . $course->Image) }}" alt="{{ $course->Title }}" class="w-full h-40 object-cover">
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $course->Title }}</h3>
            <p class="text-sm text-gray-500">Publisher: {{ $course->Publisher }}</p>
            <p class="text-sm text-gray-600 mt-2">{{ Str::limit($course->Description, 100) }}</p>
            <a href="{{ $course->Link }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-medium text-sm rounded hover:bg-blue-600 transition transform active:scale-95">Learn More</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>
</div>
</body>
</html>
