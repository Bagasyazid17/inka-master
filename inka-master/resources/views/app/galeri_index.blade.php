@extends('layouts.app.app')

@section('title')
    <title>Galeri INKA</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        GALERI INKA
                    </h2>
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
                            @foreach($galeri as $index => $item)
                            <a href="{{ route('app.galeri.show', ['id' => $item->id]) }}">
                            <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="">
                                <div data-slide-to="{{$index}}" data-toggle="modal">
                                    <img src="{{url('/')}}{{$item->media[0]->link}}" alt="">
                                    <span class="icon-focus"></span>
                                    <span class="mbr-gallery-title mbr-fonts-style display-7">{{$item->nama}}</span>
                                </div>
                            </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection