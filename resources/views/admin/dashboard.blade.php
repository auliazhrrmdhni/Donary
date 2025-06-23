@extends('layout.adminmaster')

@section('isi')
<main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Total Donatur -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM4 13a4 4 0 014-4h4a4 4 0 014 4v3H4v-3z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Donatur</p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalDonatur ?? 0 }}</p>
                </div>
              </div>

              <!-- Total Penggalang Dana -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7l-5-4H5z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Penggalang Dana</p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalPenggalang ?? 0 }}</p>
                </div>
              </div>

              <!-- Total Donasi -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a1 1 0 011-1h10a1 1 0 011 1v1H4V3zm1 3h10v11a1 1 0 01-1 1H6a1 1 0 01-1-1V6zm6 4H9v3h2v-3z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Donasi</p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">Rp {{ number_format($totalDonasi ?? 0, 0, ',', '.') }}</p>
                </div>
              </div>

              <!-- Campaign Menunggu -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6 2a1 1 0 00-1 1v2h10V3a1 1 0 00-1-1H6zM4 6v11a1 1 0 001 1h10a1 1 0 001-1V6H4zm6 4a1 1 0 012 0v3a1 1 0 11-2 0v-3z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Campaign Menunggu</p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $totalPendingCampaign ?? 0 }}</p>
                </div>
              </div>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                  <thead>
                      <tr class="text-xs font-semibold text-left text-gray-500 uppercase bg-gray-50">
                          <th class="px-4 py-3">Judul Campaign</th>
                          <th class="px-4 py-3">Penggalang</th>
                          <th class="px-4 py-3">Status</th>
                          <th class="px-4 py-3">Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                      @foreach($campaigns as $campaign)
                          <tr class="text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">{{ $campaign->judul }}</td>
                              <td class="px-4 py-3">{{ $campaign->penggalang->nama ?? 'N/A' }}</td>
                              <td class="px-4 py-3">
                                  @if($campaign->status === 'menunggu')
                                      <span class="text-orange-600">Menunggu</span>
                                  @elseif($campaign->status === 'disetujui')
                                      <span class="text-green-600">Disetujui</span>
                                  @else
                                      <span class="text-red-600">Ditolak</span>
                                  @endif
                              </td>
                              <td class="px-4 py-3">
                                  @if($campaign->status === 'menunggu')
                                      <form method="POST" action="{{ route('admin.campaign.setujui', $campaign->id) }}" class="inline">
                                          @csrf
                                          <button class="text-green-600">Setujui</button>
                                      </form>
                                      <form method="POST" action="{{ route('admin.campaign.tolak', $campaign->id) }}" class="inline ml-2">
                                          @csrf
                                          <button class="text-red-600">Tolak</button>
                                      </form>
                                  @endif
                                  <form method="POST" action="{{ route('admin.campaign.hapus', $campaign->id) }}" class="inline ml-2" onsubmit="return confirm('Hapus campaign ini?')">
                                      @csrf
                                      @method('DELETE')
                                      <button class="text-gray-600">Hapus</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>

              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                </span>
                <span class="col-span-2"></span>
              </div>
            </div>
          </div>
        </main>

@endsection