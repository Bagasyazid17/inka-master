@extends('layouts.app.app')

@section('title')
    <title>Product INKA - {{$procurement->judul}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        {{$procurement->judul}}
                    </h2>
                    <h3 class="mbr-section-subtitle mbr-light mbr-fonts-style display-5 date-created">
                        {{$procurement->mulai}} - {{$procurement->selesai}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-post">
    <div class="container">
        {!! $procurement->content !!}
    </div>
</section>

@include('layouts.app.partials.footer')

@endsection