<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Donary</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('build/assets/css/tailwind.output.css') }}" />
</head>
<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img class="object-cover w-full h-full dark:hidden" src="{{ asset('build/assets/img/login-office.jpeg') }}" alt="Office" />
          <img class="hidden object-cover w-full h-full dark:block" src="{{ asset('build/assets/img/login-office-dark.jpeg') }}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Login</h1>

            <form action="{{ route('login.submit') }}" method="POST">
              @csrf

              {{-- Email --}}
              <label class="block text-sm mb-2">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" value="{{ old('email') }}" type="email" class="block w-full mt-1 form-input" />
                @error('email')
                  <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
              </label>

              {{-- Password --}}
              <label class="block text-sm mt-4 mb-2">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password" class="block w-full mt-1 form-input" />
                @error('password')
                  <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
              </label>

              {{-- Role --}}
              <label class="block text-sm mt-4 mb-2">
                <span class="text-gray-700 dark:text-gray-400">Login sebagai</span>
                <select name="role" class="form-select mt-1 block w-full" >
                  <option value="admin">Admin</option>
                  <option value="penggalang">Penggalang Dana</option>
                  <option value="donatur">Donatur</option>
                </select>
                @error('role')
                  <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
              </label>

              {{-- Submit --}}
              <button type="submit" class="w-full mt-6 px-4 py-2 text-white bg-purple-600 rounded hover:bg-purple-700">
                Login
              </button>
            </form>

            <p class="mt-4 text-sm">
              <a href="{{ route('register') }}" class="text-purple-600 hover:underline">Belum punya akun? Daftar</a>
            </p>

            @if (session('error'))
              <div class="mt-4 text-sm text-red-500">
                {{ session('error') }}
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
