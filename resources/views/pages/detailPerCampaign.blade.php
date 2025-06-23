@extends('layout.master')

@section('slider')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Detail Campaign</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten')
<div class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 posts-list">
                <div class="single-post">
                    <div class="feature-img mb-4">
                        @if ($campaign->image_url)
                            <img class="img-fluid w-100" style="max-height: 400px; object-fit: cover;"
                                src="{{ asset('storage/campaigns/' . $campaign->image_url) }}"
                                alt="{{ $campaign->judul }}">
                        @else
                            <img class="img-fluid w-100"
                                src="{{ asset('build/assets/img/default-campaign.jpg') }}"
                                alt="{{ $campaign->judul }}">
                        @endif
                    </div>

                    <div class="blog_details">
                        <h2 class="mb-3">{{ $campaign->judul }}</h2>
                        <div class="mb-3">
                            @php
                                $progress = $campaign->target_donasi > 0
                                    ? ($campaign->donasi_sekarang / $campaign->target_donasi) * 100
                                    : 0;
                            @endphp
                            <div class="custom_progress_bar mb-2">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ $progress }}%;"
                                        aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <span class="progres_count">
                                            {{ round($progress) }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="balance d-flex justify-content-between align-items-center">
                                <span>Raised: Rp{{ number_format($campaign->donasi_sekarang, 0, ',', '.') }}</span>
                                <span>Goal: Rp{{ number_format($campaign->target_donasi, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <p class="excert mt-3">{{ $campaign->deskripsi }}</p>
                    </div>

                    <!-- Form Donasi -->
                    @auth
                    @if(auth()->user()->role === 'donatur')
                    <div class="mt-5">
                        <h4>Donasikan Sekarang</h4>
                        <form action="{{ route('donasi.store', $campaign->id) }}" method="POST">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="nominal">Nominal Donasi (Rp)</label>
                                <input type="number" name="nominal" id="nominal"
                                    class="form-control" min="1000" step="1000" required>
                                @error('nominal')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                                    <option value="">-- Pilih Metode --</option>
                                    <option value="VA">Virtual Account</option>
                                    <option value="TF">Transfer Bank</option>
                                </select>
                                @error('metode_pembayaran')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="boxed-btn3 mt-3">Kirim Donasi</button>
                        </form>
                    </div>
                    @endif
                    @endauth

                    <!-- Riwayat Donasi -->
                    <div class="mt-5">
                        <h4>Riwayat Donasi</h4>
                        <ul class="list-group">
                            @forelse($campaign->donasi as $donasi)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $donasi->user->nama ?? 'Anonim' }}</strong>
                                        <br>
                                        <small>{{ \Carbon\Carbon::parse($donasi->created_at)->format('d M Y H:i') }}</small>
                                    </div>
                                    <div>
                                        Rp{{ number_format($donasi->nominal, 0, ',', '.') }}
                                        <br>
                                        <span class="badge bg-secondary">{{ $donasi->metode_pembayaran }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Belum ada donasi.</li>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
