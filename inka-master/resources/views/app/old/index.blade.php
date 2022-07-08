@extends('layouts.app.master')

@section('title')
    <title>Selamat Datang di INKA</title>
@endsection
@section('content')

<!--
==================================================
Slider Section Start
================================================== -->
 <section id="hero-area" >
    <div class="block wow fadeInUp" data-wow-delay=".3s">
            
        <div class="hero-text">
            <div class="container hero-wrapper">
                <h1>Lokomotif ABC</h1>
                <p>Lokomotif Terbaik 2017</p>
                <div class="hero-logo">
                    <img src="{{url('/')}}/images/logo1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->
 
<!--
==================================================
Slider Section Start
================================================== -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block wow fadeInUp about-motto" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="{{url('/')}}/images/theme1.png" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="block wow fadeInUp about-text" data-wow-delay=".3s" data-wow-duration="500ms">
                    <p>
                        Established in May 18th 1981, INKA is the first fully integrated rolling stock and automotive manufacturer in Southeast Asia.  Our focus is to deliver high quality products and services to our customer.We provide wide array of products to meet our customer diverse requirements, as well as excellent after sales services to ensure our customer received the best transportation solution. Our proudcts have spread and operated in many countries in the world, such as Bangladesh, Philiphines, Malaysia, Thailand, Singapore and  Australia.
                    </p>
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="block wow fadeInRight about-img" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="{{url('/')}}/images/theme2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#about -->

<!--
==================================================
Berita Section Start
================================================== -->
<section id="feature" class="berita-index">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">Berita Terkini</h1>
        </div>
        <div class="row berita-grid">
            @foreach($berita as $item)
            <a href="{{ route('app.berita.show', ['id' => $item->id]) }}" class="col-md-4 col-sm-6 berita-wrapper">
                <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="media-left">
                        <div class="berita-thumbnail">
                            <img src="{{url('/')}}{{$item->thumbnail}}">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$item->judul}}</h4>
                        <p>{{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 60)}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section> <!-- /#feature -->

<!--
==================================================
Karir Section Start
================================================== -->
<section id="feature">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">Info Lowongan</h1>
        </div>
        <div class="row">
            @foreach($karir as $item)
            <a href="{{ route('app.karir.show', ['id' => $item->id]) }}">
                <div class="col-md-4 karir-index">
                    <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="media-body">
                            <h4 class="media-heading">{{$item->nama}}</h4>
                            <p>{{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 200)}}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section> <!-- /#feature -->

                
<!--
==================================================
Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="contact">
            <div class="row top-contact grid">
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                        <li>Informasi</li>
                        <li>Aplikasi Android</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                        <li>Informasi</li>
                        <li>Aplikasi Android</li>
                        <li>kritik dan Saran</li>
                        <li>Suku Cadang</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                        <li>Informasi</li>
                        <li>Aplikasi Android</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                        <li>Informasi</li>
                        <li>Aplikasi Android</li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-4 grid-item">
                    <h4>0351-333333</h4>
                    <ul>
                        <li>Layanan Pelanggan</li>
                        <li>Pemasaran</li>
                        <li>Informasi</li>
                    </ul>
                </div>
            </div>

            <div class="row bottom-contact">
                <div class="col-sm-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class=" col-xs-9 contact-info">
                            Layanan Pelanggan
                            <h4>0351-333333</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class=" col-xs-9 contact-info">
                            Pemesanan
                            <h4>info.inka.co.id</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class=" col-xs-9 contact-info">
                            Informasi
                            <h4>info.inka.co.id</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class=" col-xs-9 contact-info">
                            Aplikasi Andorid
                            <h4>inka.playtore</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div class="contact-img">
            
        </div> -->
    </div>
</section>

@endsection

@push('stylesheets')
    
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/js/isotope.pkgd.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    
                }
            });

            // $('.berita-grid').isotope({
            //     itemSelector: '.berita-wrapper',
            //     layoutMode: 'fitRows',
            // })
        });
    </script>
@endpush