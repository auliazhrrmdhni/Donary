@extends('layout.penggalangmaster')

@section('slider')
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
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
    <!-- slider_area_end -->
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

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Popular Causes</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                        <div class="single_cause">
                            <div class="thumb">
                                <img src="{{ asset('build/assets/img/causes/1.png') }}" alt="">
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                                30%
                                            </span>
                                        </div>
                                      </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>Raised: $5000.00 </span>
                                    <span>Goal: $9000.00 </span>
                                </div>
                                <h4>Help us to Send Food</h4>
                                <p>The passage is attributed to an 
                                    unknown typesetter in the century 
                                    who is thought</p>
                                <a class="read_more" href="cause_details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

    <!-- news__area_start  -->
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
                <div class="col-lg-12">
                    <div class="news_active owl-carousel">
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src="{{ asset('build/assets/img/news/1.png') }}" alt="">
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3>Pure Water Is More 
                                        Essential</h3>
                                </a>
                                <p>The passage experienced a 
                                    surge in popularity during the 
                                    1960s when used it on their  
                                    sheets, and again.</p>
                                <a class="read_more" href="single-blog.html">Read More</a>
                            </div>
                        </div>
                        <div class="single__blog d-flex align-items-center">
                            <div class="thum">
                                <img src="{{ asset('build/assets/img/news/2.png') }}" alt="">
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3>Pure Water Is More 
                                        Essential</h3>
                                </a>
                                <p>The passage experienced a 
                                    surge in popularity during the 
                                    1960s when used it on their  
                                    sheets, and again.</p>
                                <a class="read_more" href="single-blog.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news__area_end  -->

@endsection
