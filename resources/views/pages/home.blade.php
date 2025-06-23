@extends('layout.master')

@section('slider')
<div class="slider_area">
    <div class="single_slider d-flex align-items-center slider_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="slider_text">
                        <span>Mulai Sekarang.</span>
                        <h3>Bantu anak-anak saat mereka membutuhkannya</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten')
<!-- reson_area_start  -->
<div class="reson_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Alasan Membantu</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{ asset('build/assets/img/help/1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>Mengumpulkan Dana</h4>
                            <p>Membantu sesama dengan menyumbangkan sebagian
                                rezeki kita dapat meringankan beban mereka yang membutuhkan. 
                                Setiap koin yang terkumpul memiliki arti besar bagi masa depan seseorang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{ asset('build/assets/img/help/2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>Bantu Pendidikan Anak Kurang Mampu</h4>
                            <p>Pendidikan adalah kunci masa depan.
                            Dengan membantu anak-anak yang kurang 
                            mampu bersekolah, kita ikut membuka jalan 
                            mereka menuju kehidupan yang lebih baik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{ asset('build/assets/img/help/3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>Dukungan untuk Pengobatan</h4>
                            <p>Tak semua orang mampu membiayai
                            pengobatan penyakit serius. Bantuan dana
                            yang Anda salurkan bisa menjadi 
                            harapan baru bagi mereka untuk sembuh.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- reson_area_end  -->

<!-- Campaign Area Start -->
<div class="popular_causes_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Popular Campaigns</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($campaigns as $cn)
            <div class="col-lg-4 col-md-6">
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ asset('storage/campaigns/' . $cn->image_url) }}" alt="{{ $cn->judul }}" style="height: 250px; object-fit: cover; width: 100%;">
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{ ($cn->donasi_sekarang / $cn->target_donasi) * 100 }}%;"
                                     aria-valuenow="{{ ($cn->donasi_sekarang / $cn->target_donasi) * 100 }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                    <span class="progres_count">
                                        {{ round(($cn->donasi_sekarang / $cn->target_donasi) * 100) }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="balance d-flex justify-content-between align-items-center">
                            <span>Raised: Rp{{ number_format($cn->donasi_sekarang, 0, ',', '.') }}</span>
                            <span>Goal: Rp{{ number_format($cn->target_donasi, 0, ',', '.') }}</span>
                        </div>
                        <h4>{{ $cn->judul }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($cn->deskripsi, 100) }}</p>
                        <a class="read_more" href="{{ route('campaign.show', $cn->id) }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Campaign Area End -->

<!-- News Area Start (Optional static) -->
<div class="news__area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>News & Updates</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Static news content -->
            <div class="col-lg-6">
                <div class="single__blog d-flex align-items-center">
                    <div class="thum">
                        <img src="{{ asset('build/assets/img/news/1.png') }}" alt="">
                    </div>
                    <div class="newsinfo">
                        <span>July 18, 2019</span>
                        <a href="single-blog.html"><h3>Pure Water Is More Essential</h3></a>
                        <p>The passage experienced a surge in popularity...</p>
                        <a class="read_more" href="single-blog.html">Read More</a>
                    </div>
                </div>
            </div>
            <!-- More static news if needed -->
        </div>
    </div>
</div>
<!-- News Area End -->
@endsection
