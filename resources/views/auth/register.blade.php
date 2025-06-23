<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('build/assets/js/init-alpine.js') }}"></script>
</head>
<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('build/assets/img/create-account-office.jpeg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('build/assets/img/create-account-office-dark.jpeg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Create account</h1>

                        <!-- Tampilkan pesan error global -->
                        @if ($errors->any())
                            <div class="mb-4 text-red-600 dark:text-red-400">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <!-- Form Registrasi -->
                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf

                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Name</span>
                                <input name="nama" value="{{ old('name') }}"
                                    class="block w-full mt-1 text-sm form-input dark:bg-gray-700 dark:text-gray-300" />
                                @error('name')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </label>

                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input name="email" type="email" value="{{ old('email') }}"
                                    class="block w-full mt-1 text-sm form-input dark:bg-gray-700 dark:text-gray-300" />
                                @error('email')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password" type="password"
                                    class="block w-full mt-1 text-sm form-input dark:bg-gray-700 dark:text-gray-300" />
                                @error('password')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                                <input name="password_confirmation" type="password"
                                    class="block w-full mt-1 text-sm form-input dark:bg-gray-700 dark:text-gray-300" />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Daftar sebagai</span>
                                <select name="role"
                                    class="block w-full mt-1 text-sm form-select dark:bg-gray-700 dark:text-gray-300">
                                    <option value="">-- Pilih --</option>
                                    <option value="donatur" {{ old('role') == 'donatur' ? 'selected' : '' }}>Donatur</option>
                                    <option value="penggalang" {{ old('role') == 'penggalang' ? 'selected' : '' }}>Penggalang Dana</option>
                                </select>
                                @error('role')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </label>

                            <button type="submit"
                                class="block w-full px-4 py-2 mt-6 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
                                Create Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>