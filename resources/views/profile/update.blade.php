<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Profile Updated</title>
</head>
<body>

<div class="min-h-full">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Profile Updated</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
          <h2 class="text-lg font-medium leading-6 text-gray-900">Your Profile has been updated successfully!</h2>
          <p class="mt-3 text-sm text-gray-600">Click the button below to go back to your profile page.</p>

          <div class="mt-5">
            <a href="{{ route('profile.view') }}" class="btn btn-info text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">
              Go Back to Your Profile
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

</div>

</body>
</html>
