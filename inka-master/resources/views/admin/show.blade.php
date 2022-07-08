@extends('layouts.app.app')

@section('title')
    <title>Preview</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="align-center pb-3 mbr-fonts-style display-2">
                        Preview
                    </h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5 date-created">
                        Preview Tampilan Halaman
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-post">
    <div class="container">
        {!! $preview->content !!}
    </div>
</section>

@include('layouts.app.partials.footer')

@endsection