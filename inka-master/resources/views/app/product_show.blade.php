@extends('layouts.app.app')

@section('title')
    <title>Product INKA - {{$product->nama}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        {{$product->nama}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-post">
    <div class="container">
        {!! $product->content !!}
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

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