@extends('layout.penggalangmaster')

@section('slider')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Edit Campaign</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten')
<div class="container mt-5 mb-5">
    <h3 class="mb-4">Form Edit Campaign</h3>

    <form action="{{ route('penggalang.campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="judul">Judul Campaign</label>
            <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul', $campaign->judul) }}" required>
            @error('judul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required>{{ old('deskripsi', $campaign->deskripsi) }}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="target_donasi">Target Donasi (Rp)</label>
            <input type="number" name="target_donasi" class="form-control" id="target_donasi" value="{{ old('target_donasi', $campaign->target_donasi) }}" min="1000" required>
            @error('target_donasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="image_url">Gambar Campaign</label><br>
            @if($campaign->image_url)
                <img src="{{ asset('storage/campaigns/' . $campaign->image_url) }}" alt="Current Image" style="max-width: 300px;" class="mb-3 d-block">
            @endif
            <input type="file" name="image_url" class="form-control" id="image_url" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            @error('image_url')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="boxed-btn3">Simpan Perubahan</button>
    </form>
</div>
@endsection
