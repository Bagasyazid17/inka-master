@extends('layouts.app.app')

@section('title')
    @if(Session::get('lang') == 'id')
        <title>Selamat Datang</title>
    @elseif(Session::get('lang') == 'en')
        <title>Welcome to INKA</title>
    @endif
@endsection

@section('content')

<section class="carousel slide cid-qDtkpaow4r" data-interval="false" id="slider1-10" data-rv-view="1562">
    <div class="full-screen">
        <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="8000">
            <ol class="carousel-indicators">
                @foreach($slider as $index => $item)
                    @if($index == 0)
                        <li data-app-prevent-settings="" data-target="#slider1-10" class=" active" data-slide-to="{{$index}}"></li>
                    @else
                        <li data-app-prevent-settings="" data-target="#slider1-10" data-slide-to="{{$index}}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($slider as $index => $item)
                    @if($index == 0)
                    <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url('{{url('/')}}{{$item->gambar}}');">
                    @else
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url('{{url('/')}}{{$item->gambar}}');">
                    @endif
                    <a href="@if($item->url) http://{{ $item->url }} @else # @endif">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div>
                                <div class="carousel-caption justify-content-center">
                                    <!-- <div class="col-10 align-center"> -->
                                    <div class="container">
                                        <h2 class="mbr-fonts-style display-1">{{$item->tagline_1}}</h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">{{$item->tagline_2}}</p>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
            <div class="carousel-control-wrapper">
                <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-10">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-10">
                    <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <img src="{{url('/')}}/assets/slider2.png" class="slider-label-img">
        </div>

    </div>
</section>

<section class="main-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12 menu-wrapper">
                <div class="row">
                <?php $width = 6.6/12*100/sizeof($masterProduct); ?>
                    @foreach($masterProduct as $item)
                    <div class="responsive-width col-xs-3">
                        <a href="{{ route('app.product.index', ['id' => $item->id]) }}">
                            <div class="menu-card">
                                <img src="{{url('/')}}{{$item->icon}}">
                                <p>
                                    @if(Session::get('lang') == 'id')
                                        {{$item->nama_id}}
                                    @elseif(Session::get('lang') == 'en')
                                        {{$item->nama_en}}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- <section class="about">
    <div class="about-img">
        <img src="{{url('/')}}/inka/about.jpg">
    </div>
</section>
 -->

<div class="container">
    <div class="row">
        <div class="col-sm-4 about">
           <div class="container">
                <div class="section-title">
                    <div class="company-logo center">
                        <img src="{{url('/')}}/assets/logo/logo-md.png">
                    </div>
                    <div class="company-slogan center">
                        <img src="{{url('/')}}/assets/slogan.png">
                    </div>
                </div>
                <div class="about-text">
                @if(Session::get('lang') == 'en')
                    <p>Established in May 18th 1981, PT INKA (Persero) is the first fully integrated rolling stock manufacturer in Southeast Asia. Our focus is to deliver high quality products and services to our customer. We provide wide array of products to meet our customer diverse requirements, as well as excellent after sales services to ensure our customer received the best transportation solution. Besides operated in Indonesia, our products have spread and operated in many countries in the world, such as Bangladesh, Philippines, Malaysia, Thailand, Singapore and Australia.</p>
                @elseif(Session::get('lang') == 'id')
                    <p>Didirikan pada tanggal 18 Mei 1981, PT INKA (Persero) adalah produsen kereta api terintegrasi pertama di Asia Tenggara. Fokus kami adalah menghadirkan produk dan layanan berkualitas tinggi kepada pelanggan kami. Kami menyediakan berbagai produk untuk memenuhi beragam kebutuhan pelanggan kami, serta layanan purna jual (after sales) untuk memastikan pelanggan kami mendapatkan solusi transportasi terbaik. Selain dioperasikan di Indonesia, produk kami telah menyebar dan beroperasi di banyak negara di dunia, seperti Bangladesh, Filipina, Malaysia, Thailand, Singapura dan Australia.</p>
                @endif
                </div>
                <div class="about-bottom-img center">
                    <img src="{{url('/')}}/assets/BUMN_NEW.png">
                </div>
            </div> 
        </div>
        <div class="col-sm-8">
            @foreach($homeSetting as $setting)
            @if($setting->nama == 'product')
            <?php $rowWidth = 12/$setting->column; ?>
            <section class="features3 cid-qDtERLZjyn" id="features3-1d" data-rv-view="1898">
                <div class="container">
                    <div class="section-title">
                        <h2>
                        @if(Session::get('lang') == 'id')
                            PRODUK
                        @elseif(Session::get('lang') == 'en')
                            PRODUCT
                        @endif
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="media-container-row">
                        <div class="row">
                            @foreach($product as $index => $item)
                            <div class="card p-3 col-sm-6 col-md-{{$rowWidth}}">
                                <div class="card-wrapper">
                                    <div class="card-img" style="background-image: url('{{ $item->getThumbnail($item->content) }}');">
                                        <!-- <img src="{{ $item->getThumbnail($item->content) }}" alt="Thumbnail" media-simple="true"> -->
                                    </div>
                                    <div class="card-box">
                                        <h4 class="card-title mbr-fonts-style display-7">
                                            {{$item->nama}}
                                        </h4>
                                        <p class="mbr-text mbr-fonts-style display-7">
                                            {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 60)}}
                                        </p>
                                    </div>
                                    <div class="mbr-section-btn text-center">
                                        <a href="{{ route('app.product.show', ['id' => $item->id]) }}" class="btn btn-primary display-4">
                                            @if(Session::get('lang') == 'id')
                                                Baca
                                            @elseif(Session::get('lang') == 'en')
                                                Read More
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endif
            @endforeach

        </div>
    </div>
</div>

@foreach($homeSetting as $setting)          

        @if($setting->nama == 'berita')
            <?php $rowWidth = 12/$setting->column; ?>
            <section class="features2 cid-qDtERr6ezV" id="features2-1c" data-rv-view="1895">
                <div class="container">
                    <div class="section-title">
                        <h2>
                        @if(Session::get('lang') == 'id')
                            BERITA
                        @elseif(Session::get('lang') == 'en')
                            ARTICLE
                        @endif
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="media-container-row">
                        <div class="row">
                            @foreach($berita as $item)
                                <div class="card p-3 col-12 col-md-6 col-lg-{{$rowWidth}}">
                                    <div class="card-wrapper">
                                        <div class="card-img">
                                            <img src="{{url('/')}}{{$item->thumbnail}}" alt="Thumbnail" media-simple="true">
                                        </div>
                                        <div class="card-box">
                                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                                {{$item->judul}}
                                            </h4>
                                            <p class="mbr-text mbr-fonts-style display-7">
                                                {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 150)}} 
                                                <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">Selengkapnya</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            

        @elseif($setting->nama == 'karir')
            <?php $rowWidth = 12/$setting->column; ?>
            <section class="features4 cid-qDtETaGhij" id="features4-1f" data-rv-view="1904">
                <div class="container">
                    <div class="section-title">
                        <h2>
                        @if(Session::get('lang') == 'id')
                            KARIR
                        @elseif(Session::get('lang') == 'en')
                            CAREER
                        @endif
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="media-container-row">
                        <div class="row">
                            @foreach($karir as $item)
                                <div class="card p-3 col-12 col-md-6 col-lg-{{$rowWidth}}">
                                    <div class="card-wrapper media-container-row media-container-row">
                                        <div class="card-box">
                                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                                {{$item->nama}}
                                            </h4>
                                            <p class="mbr-text mbr-fonts-style display-7">
                                                {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 350)}}
                                                <a href="{{ route('app.karir.show', ['id' => $item->id]) }}">Selengkapnya</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        
        @elseif($setting->nama == 'survey')
            <section class="features4 cid-qDtETaGhij survey-section" id="features4-1f" data-rv-view="1904">
                <div class="container">
                    <div class="section-title">
                        <h2>
                        SURVEY
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="media-container-row">
                        <div class="row">
                            <strong>Bagaimana menurut anda tentang PT. INKA? Ikuti survey kami&ensp;
                                <a href="http://{{$setting->link}}" target="_blank"><strong>disini</strong></a>.
                            </strong>
                        </div>
                    </div>
                </div>
            </section>
        @endif
@endforeach

<section class="home-footer" id="footer-hm" style="background-image: url({{url('/')}}/images/slider2/img5.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row grid">
                        @foreach(Session::get('menu') as $menu)
                            @if($menu->nama == 'Korporasi' || $menu->nama == 'Corporation')
                                <div class="col-xs-6 col-sm-6 col-md-4 grid-item">
                                    <h4>{{$menu->nama}}</h4>
                                    <ul>
                                    @foreach(Session::get('corporation') as $item)
                                        <li><a href="{{ route('app.corporation.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>

                            @elseif($menu->nama == 'Produk' || $menu->nama == 'Product')
                                    <div class="col-xs-6 col-sm-6 col-md-4 grid-item">
                                        <h4>{{$menu->nama}}</h4>
                                        <ul>
                                        @foreach(Session::get('masterProduct') as $item)
                                            <li><a href="{{ route('app.product.index', ['id' => $item->id]) }}">
                                                @if(Session::get('lang') == 'id'){{$item->nama_id}}
                                                @elseif(Session::get('lang') == 'en'){{$item->nama_en}}
                                                @endif
                                            </a></li>
                                        @endforeach
                                        </ul>
                                    </div>

                            @elseif($menu->nama == 'Stakeholder Relation')
                                    <div class="col-xs-6 col-sm-6 col-md-4 grid-item">
                                        <h4>{{$menu->nama}}</h4>
                                        <ul>
                                        @foreach(Session::get('masterProcurement') as $item)
                                            <li><a href="{{ route('app.procurement.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                        @endforeach
                                            <li><a href="{{ route('app.galeri.index') }}">Galeri</a></li>
                                            <li><a href="{{ route('app.karir.index') }}">Karir</a></li>
                                            <li><a href="{{ route('app.contact.index') }}">Kontak</a></li>
                                        </ul>
                                    </div>

                            @elseif($menu->built_in != 1)
                                    <div class="col-xs-6 col-sm-6 col-md-4 grid-item">
                                        <h4>{{$menu->nama}}</h4>
                                        <ul>
                                        @foreach($menu->page as $item)
                                            <li><a href="{{ route('app.page.show', ['id' => $item->id]) }}">{{$item->nama}}</a></li>
                                    @endforeach
                                        </ul>
                                    </div>
                            @endif
                                
                        @endforeach

                        @foreach($footer as $item)
                            <div class="col-xs-6 col-sm-6 col-md-4 grid-item">
                                <h4>
                                    @if(Session::get('lang') == 'id'){{$item->nama_id}}
                                    @elseif(Session::get('lang') == 'en'){{$item->nama_en}}
                                    @endif
                                </h4>
                                <ul>
                                @foreach($item->subFooter as $subFooter)
                                    <li>
                                    <a href="http://{{ $subFooter->link }}">
                                        @if(Session::get('lang') == 'id'){{$subFooter->nama_id}}
                                        @elseif(Session::get('lang') == 'en'){{$subFooter->nama_en}}
                                        @endif
                                    </a></li>
                                @endforeach
                                </ul>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

                <div class="row bottom-contact">
                    <div class="col-xs-6 col-md-3">
                        <div class="contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class="contact-info">
                            Phone
                            <h4>(0351) 452271</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="contact-icon">
                            <img src="{{url('/')}}/icon/info2.png">
                        </div>
                        <div class="contact-info">
                            Email
                            <h4>support@inka.co.id</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="contact-icon">
                            <img src="{{url('/')}}/icon/info1.png">
                        </div>
                        <div class="contact-info">
                            Fax
                            <h4>(0351) 452275</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="contact-icon">
                            <img src="{{url('/')}}/icon/info3.png">
                        </div>
                        <div class="contact-info">
                            Aplikasi Andorid
                            <h4>inka.playstore</h4> 
                        </div>
                    </div>
                </div> 
            </div>
            <!-- left -->

            <div class="col-sm-3">
                <div class="right-footer center">
                    <img src="{{url('/')}}/assets/safety.png">
                    <p>Create an integrated solution for railway and urban transportation with competitive advantages in business and the appropriate of product technology to encourage the development of sustainable transport.</p>
                    <img src="{{url('/')}}/assets/logo/logo-md.png" class="footer-logo">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('stylesheets')
    <style type="text/css">
        .header-wrapper{
            display: none;
        }

        .responsive-width{
            width: {{$width}}%;
        }

        @media only screen and (max-width: 567px){
            .responsive-width{
                width: 100%;
            }            
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="{{url('/')}}/js/isotope.pkgd.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    
                }
            });
        });
    </script>
@endpush