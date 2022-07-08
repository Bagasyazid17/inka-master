@extends('layouts.app.app')

@section('title')
    <title>INKA - {{$page->nama}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        {{$page->nama}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-post">
	<div class="container">
        @if($page->menu->built_in == 0)
            @if($page->has_sub == 1)
                <div class="row page-tab-wrapper">
                    @foreach($page->childPage as $index => $item)
                    <div class="col-sm-3">
                        <div class="page-tab" href="child-{{$index}}">
                            {{ $item->nama }}
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            @if($page->has_sub == 0)
                <div class="post-content">
                    {!! $page->content !!}
                </div>
            @elseif($page->has_sub == 1)
                @foreach($page->childPage as $index => $item)
                <div class="post-content page-child" id="child-{{$index}}">
                    {!! $item->content !!}
                </div>
                @endforeach
            @endif
        @elseif($page->menu->built_in == 1)
            @if($page->page_id)
                <div class="post-content">
                    {!! $page->content !!}
                </div>
            @elseif(!$page->page_id)
            <div class="row">
                @foreach($page->childPage as $item)
                    <div class="col-md-12 karir-item">
                        <a href="{{ route('app.page.show', ['id' => $item->id]) }}">
                            <h4 class="box-text box-title">
                                {{$item->nama}}
                            </h4>
                        </a>
                        <p class="box-text box-detail">
                            {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 350)}}
                        </p>
                        <a href="{{ route('app.page.show', ['id' => $item->id]) }}">selengkapnya</a>
                    </div>
                @endforeach
            </div>
            @endif
        @endif
	</div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cke_editable_inline').removeAttr('title');
            $('.page-tab').first().addClass('page-active');
            $('#child-0').show();
            $('.page-tab').on('click', function(){
                $('.page-tab').removeClass('page-active');
                var child = $(this).attr('href');
                $(this).addClass('page-active');
                $('.page-child').hide();
                $('#'+child).show();
            });
        });
    </script>
@endpush

@push('stylesheets')
    <link href="{{url('/')}}/imageviewer/imageviewer.css"  rel="stylesheet" type="text/css" />
    <style type="text/css">
        .single-post img:hover{
            cursor: pointer;
        }
        #iv-container{
            z-index: 1900;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{url('/')}}/imageviewer/imageviewer.js"></script>
    <script type="text/javascript">
        var viewer = ImageViewer({}); 
        $('.single-post img').click(function () {
            ImageViewer({}).show(this.src);
        });
    </script>
@endpush