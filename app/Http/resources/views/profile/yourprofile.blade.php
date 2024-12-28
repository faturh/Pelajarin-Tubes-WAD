<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Your Profile</title>
</head>
<body>

<div class="min-h-full">
  <!-- Navigation bar -->
  <nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-16" src="/storage/General/pelajarinlogo.png" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
                <a href="main" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Skill-Learning</a>
                <a href="elearn" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">E-Learning</a>
                <a href="jobseaker" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">JobSeaker</a>
                <!-- <a href="main" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">Skill-Learning</a>
                <a href="elearn" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">E-Learning</a>
                <a href="jobseaker" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Jobseaker</a>
                <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a> -->
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="relative ml-3">
              <div>
                <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <img class="h-8 w-8 rounded-full" src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}" alt="">
                </button>
              </div>
              <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" 
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="yourprofile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Your Profile</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="flex items-center space-x-4">
        <!-- Profile Picture -->
        <div class="profile-picture cursor-pointer">
          <img 
            src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}" 
            alt="Profile Picture" 
            class="rounded-full w-32 h-32 object-cover" 
            onclick="document.getElementById('profile-modal').classList.remove('hidden')"
          >
        </div>

        <!-- Personal Information -->
        <div>
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h2 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h2>
                <div class="mt-5">
                    <dl>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 mt-4">
                            <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 mt-4">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ ucfirst($user->role) }}</dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 mt-6">
                            <dt class="text-sm font-medium text-gray-500">Bio</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ ucfirst($user->bio ?? 'No bio available') }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Edit Profile Button -->
                <div class="mt-8 flex justify-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-info text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal to View Larger Profile Picture -->
      <div id="profile-modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-4 rounded-lg shadow-lg">
          <img 
            src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('default-avatar.png') }}" 
            alt="Profile Picture" 
            class="rounded-full w-64 h-64 object-cover"
          >
          <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md" onclick="document.getElementById('profile-modal').classList.add('hidden')">Close</button>
        </div>
      </div>

    </div>
  </main>

</div>

</body>
</html>
