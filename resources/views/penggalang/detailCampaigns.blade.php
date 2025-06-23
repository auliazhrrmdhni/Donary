@extends('layout.penggalangmaster')

@section('slider')
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Campaign Saya</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end -->
@endsection

@section('konten')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Campaign Anda</h3>
        <a href="{{ route('penggalang.campaign.create') }}" class="btn btn-success">
            + Buat Campaign Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($campaigns as $campaign)
            @php
                $progress = $campaign->target_donasi > 0 ? ($campaign->donasi_sekarang / $campaign->target_donasi) * 100 : 0;
            @endphp
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ $campaign->image_url ? asset('storage/campaigns/' . $campaign->image_url) : asset('build/assets/img/default-campaign.jpg') }}"
                         class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $campaign->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $campaign->judul }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($campaign->deskripsi, 100, '...') }}</p>

                        <div class="mb-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;">
                                    {{ round($progress) }}%
                                </div>
                            </div>
                            <small>Raised: Rp{{ number_format($campaign->donasi_sekarang, 0, ',', '.') }} /
                                   Rp{{ number_format($campaign->target_donasi, 0, ',', '.') }}</small>
                        </div>

                        <p><strong>Status:</strong>
                            @if($campaign->status === 'disetujui')
                                <span class="badge bg-success text-white">Disetujui</span>
                            @elseif($campaign->status === 'ditolak')
                                <span class="badge bg-danger text-white">Ditolak</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @endif
                        </p>

                        <a href="{{ route('penggalang.campaign.edit', $campaign->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('penggalang.campaign.destroy', $campaign->id) }}" method="POST"
                              class="d-inline" onsubmit="return confirm('Yakin ingin menghapus campaign ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Anda belum memiliki campaign. <br>
                    <a href="{{ route('penggalang.campaign.create') }}" class="btn btn-outline-primary mt-2">Buat Sekarang</a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
