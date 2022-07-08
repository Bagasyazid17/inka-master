@extends('layouts.app.master')

@section('title')
    <title>Berita INKA</title>
@endsection

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Berita INKA</h2>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section class="single-post">
    <div class="container"> 
        <div class="row berita-grid">
        @foreach($berita as $item)
            <div class="col-md-12 berita-wrapper">
                <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                    <div class="blog-post-image">
                        <a href="{{ route('app.berita.show', ['id' => $item->id]) }}"><img class="img-responsive" src="{{url('/')}}/{{ $item->thumbnail }}" alt="" /></a>
                    </div>
                    <div class="blog-content">
                        <h2 class="blogpost-title">
                        <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">{{$item->judul}}</a>
                        </h2>
                        <div class="blog-meta">
                            <span>{{$item->created_at}}</span>
                        </div>
                        <p>
                            {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 400)}}
                        </p>
                        <a href="{{ route('app.berita.show', ['id' => $item->id]) }}" class="btn btn-dafault btn-details">Baca</a>
                    </div>
                </article>
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