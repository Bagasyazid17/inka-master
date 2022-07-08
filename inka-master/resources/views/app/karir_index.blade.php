@extends('layouts.app.app')

@section('title')
    <title>Karir INKA</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        KARIR INKA
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="karir-list">
    <div class="container">
        <div class="row">
            @foreach($karir as $item)
                <div class="col-md-12 karir-item">
                    <a href="{{ route('app.karir.show', ['id' => $item->id]) }}">
                        <h4 class="box-text box-title">
                            {{$item->nama}}
                        </h4>
                        <h3 class="box-text box-subtitle">
                            {{$item->mulai}} - {{$item->selesai}}
                        </h3>
                    </a>
                    <p class="box-text box-detail">
                        {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 350)}}
                    </p>
                    <a href="{{ route('app.karir.show', ['id' => $item->id]) }}">selengkapnya</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

@push('scripts')
@endpush