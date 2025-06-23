@extends('layout.master')

@section('slider')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Campaign</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
@endsection

@section('konten')
    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area pt-120">
        <div class="container">
            <div class="row">
                @foreach($campaigns as $cn)
                    @php
                        $progress = $cn->target_donasi > 0 ? ($cn->donasi_sekarang / $cn->target_donasi) * 100 : 0;
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="single_cause">
                        <div class="thumb">
                            @if($cn->image_url)
                                <img src="{{ asset('storage/campaigns/' . $cn->image_url) }}" alt="">
                            @else
                                <img src="{{ asset('build/assets/img/default-campaign.jpg') }}" alt="">
                            @endif
                        </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $progress }}%;"
                                            aria-valuenow="{{ $progress }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                                {{ round($progress) }}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center mt-2">
                                    <span>Raised: Rp{{ number_format($cn->donasi_sekarang, 0, ',', '.') }}</span>
                                    <span>Goal: Rp{{ number_format($cn->target_donasi, 0, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('campaign.show', $cn->id) }}">
                                    <h4>{{ $cn->judul }}</h4>
                                </a>
                                <p>{{ \Illuminate\Support\Str::limit($cn->deskripsi, 100, '...') }}</p>
                                <a class="read_more" href="{{ route('campaign.show', $cn->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->
@endsection
