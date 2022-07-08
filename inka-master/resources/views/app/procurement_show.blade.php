@extends('layouts.app.app')

@section('title')
    <title>INKA - {{$masterProcurement->nama}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        {{$masterProcurement->nama}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-post">
    <div class="container">
        @if(sizeof($masterProcurement->publishedProcurement) > 0)
            <div class="row corpotaion-tab-wrapper">
                @foreach($masterProcurement->publishedProcurement as $index => $item)
                <div class="col-sm-3">
                    <div class="corpotaion-tab" href="child-{{$index}}">
                        {{ $item->judul }}
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        @if(sizeof($masterProcurement->publishedProcurement) > 0)
            @foreach($masterProcurement->publishedProcurement as $index => $item)
            <div class="post-content corporation-child" id="child-{{$index}}">
                <div>
                    {!! $item->content !!}
                </div>
                <div class="wrapper-document-list">
                    @foreach($item->document as $item)
                        <a href="{{route('procurement.download-document', ['id' => $item->id])}}" target="_blank" class="item-document-list">{{$item->nama}}</a>
                    @endforeach
                </div>
            </div>
            @endforeach
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
            $('.corpotaion-tab').first().addClass('corporation-active');
            $('#child-0').show();
            $('.corpotaion-tab').on('click', function(){
                $('.corpotaion-tab').removeClass('corporation-active');
                var child = $(this).attr('href');
                $(this).addClass('corporation-active');
                $('.corporation-child').hide();
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
        .iv-close:after, .iv-close:before{
            background: red;
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