@extends('layout.penggalangmaster')

@section('slider')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Buat Campaign Baru</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten')
<div class="container mt-5 mb-5">
    <h3 class="mb-4">Formulir Pengajuan Campaign</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('penggalang.campaign.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="judul">Judul Campaign</label>
            <input type="text" name="judul" class="form-control" id="judul" required value="{{ old('judul') }}">
            @error('judul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi Campaign</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="target_donasi">Target Donasi (Rp)</label>
            <input type="number" name="target_donasi" class="form-control" id="target_donasi" required min="1000" value="{{ old('target_donasi') }}">
            @error('target_donasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="image_url">Gambar Campaign (opsional)</label>
            <input type="file" name="image_url" class="form-control" id="image_url" accept="image/*">
            @error('image_url')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="boxed-btn3">Ajukan Campaign</button>
    </form>
</div>
@endsection
