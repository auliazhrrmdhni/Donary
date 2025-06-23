@extends('layout.adminmaster')

@section('isi')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Tinjau Campaign Penggalang Dana
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
              <th class="px-4 py-3">Judul</th>
              <th class="px-4 py-3">Deskripsi</th>
              <th class="px-4 py-3">Target</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($campaigns as $campaign)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">{{ $campaign->judul }}</td>
              <td class="px-4 py-3">{{ Str::limit($campaign->deskripsi, 50) }}</td>
              <td class="px-4 py-3">Rp {{ number_format($campaign->target_donasi, 0, ',', '.') }}</td>
              <td class="px-4 py-3">
                <span class="text-sm font-semibold {{ $campaign->status == 'disetujui' ? 'text-green-500' : ($campaign->status == 'ditolak' ? 'text-red-500' : 'text-yellow-500') }}">
                  {{ ucfirst($campaign->status) }}
                </span>
              </td>
              <td class="px-4 py-3">
                <form method="POST" action="{{ route('admin.campaigns.updateStatus', $campaign->id) }}">
                  @csrf
                  <select name="status" onchange="this.form.submit()" class="text-sm rounded border-gray-300 dark:bg-gray-700 dark:text-gray-200">
                    <option value="menunggu" {{ $campaign->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="disetujui" {{ $campaign->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ $campaign->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                  </select>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection
