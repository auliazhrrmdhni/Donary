@extends('layout.adminmaster')

@section('isi')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Daftar Pengguna Terdaftar
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Role</th>
              <th class="px-4 py-3">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($users as $index => $user)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                <td class="px-4 py-3 text-sm">{{ $user->nama }}</td>
                <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                <td class="px-4 py-3 text-sm capitalize">{{ $user->role }}</td>
                <td class="px-4 py-3 text-sm">{{ $user->created_at->format('d M Y') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-4 py-3 text-center text-sm text-gray-500">
                  Tidak ada pengguna yang terdaftar.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection
