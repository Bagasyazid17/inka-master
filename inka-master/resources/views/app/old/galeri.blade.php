@extends('layouts.app.master')

@section('title')
    <title>Galeri INKA</title>
@endsection

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$galeri->nama}}</h2>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section class="single-post">
    <div class="container"> 
        <div class="row berita-grid">
        @foreach($galeri->media as $item)
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated portfolio-item animated" data-wow-duration="500ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 0ms; -webkit-animation-delay: 0ms; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
                    <div class="img-wrapper">
                        <img src="{{url('/')}}/{{$item->link}}" class="img-responsive" alt="this is a title">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="#">{{ $item->nama }}</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/js/isotope.pkgd.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.berita-grid').isotope({
                itemSelector: '.berita-wrapper',
                layoutMode: 'fitRows',
            })
        });
    </script>
@endpush