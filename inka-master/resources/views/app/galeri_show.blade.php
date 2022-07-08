@extends('layouts.app.app')

@section('title')
    <title>Galeri INKA - {{$galeri->nama}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        {{$galeri->nama}}
                    </h2>
                    <h3 class="mbr-section-subtitle mbr-light mbr-fonts-style display-5 date-created">
                        {{$galeri->created_at}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-qDtEEG54UQ galeri-media" id="gallery1-14" data-rv-view="1849">
    <div class="container">
        <div>
            <!-- Filter -->
            <!-- Gallery -->
            <div class="mbr-gallery-row">
                <div class="mbr-gallery-layout-default">
                    <div>
                        <div>
                            <!-- <ul id="images">
                                @foreach($galeri->media as $index => $item)
                                <li>
                                <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="">
                                    <div href="#lb-gallery1-14" data-slide-to="{{$index}}" data-toggle="modal">
                                        <img src="{{url('/')}}{{$item->link}}" alt="Picture">
                                        <span class="icon-focus"></span>
                                        <span class="mbr-gallery-title mbr-fonts-style display-7">{{$item->nama}}</span>
                                    </div>
                                </div>
                                </li>
                                @endforeach
                            </ul> -->
                            <ul id="images2">
                                @foreach($galeri->media as $index => $item)
                                    <li class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="">
                                        <img src="{{url('/')}}{{$item->link}}" alt="{{$item->nama}}">
                                        <span class="mbr-gallery-title mbr-fonts-style display-7">{{$item->nama}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div>
            </div>

            <!-- Lightbox -->
            <!-- <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-14">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="carousel-inner">
                                @foreach($galeri->media as $index => $item)
                                    @if($index == 0)
                                        <div class="carousel-item active"><img src="{{url('/')}}{{$item->link}}" alt=""></div>
                                    @else
                                        <div class="carousel-item"><img src="{{url('/')}}{{$item->link}}" alt=""></div>
                                    @endif
                                @endforeach
                            </div><a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-14"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-14"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

@push('stylesheets')
    <link  href="{{url('/')}}/viewerjs/dist/viewer.css" rel="stylesheet">
    <style type="text/css">
        li.mbr-gallery-item{
            overflow: hidden;
            position: absolute;
        }
        .cid-qDtEEG54UQ .mbr-gallery-title{
            width: calc(100% - 16px);
            background: linear-gradient(to left, rgb(85, 67, 70), rgb(69, 80, 91)) !important;
        }
        .viewer-container{
            z-index: 9999;
        }
        .viewer-title{
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{url('/')}}/viewerjs/dist/viewer.js"></script>
    <script type="text/javascript">
        $('.mbr-gallery-title').css('top', ($(this).siblings().innerHeight()));
        // var viewer = new Viewer(document.getElementById('images'));
        var viewer2 = new Viewer(document.getElementById('images2'), {
            loop: true
        });
    </script>
@endpush