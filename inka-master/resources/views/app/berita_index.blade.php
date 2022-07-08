@extends('layouts.app.app')

@section('title')
    <title>Berita INKA</title>
@endsection

@section('content')
<!-- <section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="align-center pb-3 mbr-fonts-style display-2">
                        Berita INKA
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="top-padding"></section>

<section class="berita-list">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="list-title">
                    <h2>BERITA INKA</h2>
                </div>
                {!! Form::open(['method' => 'GET','route' => ['app.berita.index'], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
                    <div class="search-berita">
                    
                            <div class="input-group">
                                <input type="text" class="form-control input-search" name="search" placeholder="Cari" value="{{ app('request')->input('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-search" type="submit">Cari</button>
                                </span>
                            </div><!-- /input-group -->
                    
                    </div>
                {!! Form::close() !!}
                @if(sizeof($berita) == 0)
                    <strong>Tidak ada berita untuk di tampilkan</strong>
                @else
                    @foreach($berita as $item)
                        <div class="berita-item">
                            <div class="row">
                                <div class="col-sm-5 berita-list-thumbnail">
                                    <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">
                                        <img src="{{url('/')}}{{$item->thumbnail}}">
                                    </a>
                                </div>
                                <div class="col-sm-7">
                                    <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">
                                        <h4 class="box-text box-title">
                                            {{$item->judul}}
                                        </h4>
                                        <h3 class="box-text box-subtitle">
                                            {{$item->created_at->format('d F Y')}}
                                        </h3>
                                    </a>
                                    <p class="box-text box-detail">
                                        {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 250)}}
                                    </p>
                                    <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="page-control center">
                        <ul class="pagination center">

                            <li class="page-item"><a class="page-link" href="{{$berita->previousPageUrl()}}"><<</a></li>
                            <?php
                                $lastPage = ceil($berita->total()/$berita->perPage());
                                $startPage = $berita->currentPage() -3;
                                if ($startPage<=1) {
                                    $startPage = 1;
                                    $startSkip = '';
                                }
                                else{
                                    $startSkip = true;
                                }

                                $endPage = $berita->currentPage() +3;
                                if ($endPage>=$lastPage) {
                                    $endPage = $lastPage;
                                    $endSkip = '';
                                }
                                else{
                                    $endSkip = true;
                                }
                            ?>

                            @if($startSkip)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                            @endif

                            @for($i = $startPage; $i <= $endPage; $i++)
                                @if($berita->currentPage() == $i)
                                    <li class="page-item active"><a class="page-link" href="{{$berita->url($i)}}">{{$i}}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{$berita->url($i)}}">{{$i}}</a></li>
                                @endif
                            @endfor

                            @if($endSkip)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="{{$berita->url($lastPage)}}">{{$lastPage}}</a></li>
                            @endif

                            <li class="page-item"><a class="page-link" href="{{$berita->nextPageUrl()}}">>></a></li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="list-title">
                    <h2>TERPOPULER</h2>
                </div>
                <div class="popular-list">
                    @foreach($popular as $item)
                        <div class="popular-item">
                            <a href="{{ route('app.berita.show', ['id' => $item->id]) }}">
                                <div class="popular-date">
                                    {{ $item->created_at }} <span class="label popular-label">{{ $item->view_count }}</span>
                                </div>
                                <div class="popular-title">
                                    {{ $item->judul }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="list-title">
                    <h2>ARSIP</h2>
                </div>
                {!! Form::open(['method' => 'GET','route' => ['app.berita.index'], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
                    <div class="arsip-filter">
                        <div class="input-group">
                            {!! Form::select('year', $year, null, array('placeholder' => 'Tahun','class' => 'form-control')) !!}
                        </div><!-- /input-group -->
                        <div class="input-group">
                            {!! Form::select('month', $month, null, array('placeholder' => 'Bulan','class' => 'form-control')) !!}
                        </div><!-- /input-group -->
                        <button class="btn btn-default btn-search" type="submit">Cari</button>
                    </div>
                {!! Form::close() !!}
                
                <div class="twitter-wrapper">
                    <div class="list-title">
                        <h2>TWITTER INKA</h2>
                    </div>
                    <div class="twitter-list">
                    <a class="twitter-timeline" href="https://twitter.com/ptinka?ref_src=twsrc%5Etfw">Tweets by ptinka</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-search').on('click', function(){
                var search = $('.input-search').val();
                console.log(search);
            });
        });
    </script>
@endpush