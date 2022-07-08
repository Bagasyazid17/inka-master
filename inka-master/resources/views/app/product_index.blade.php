@extends('layouts.app.app')

@section('title')
    <title>Product INKA - {{$masterProduct->nama}}</title>
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                        @if(Session::get('lang') == 'id')
                            {{$masterProduct->nama_id}}
                        @elseif(Session::get('lang') == 'en')
                            {{$masterProduct->nama_en}}
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-list">
    <div class="container">
        <div class="product-filter">
            <div class="button-group filters-button-group">
            @if(sizeof($masterProduct->categoryProduct)>0)
                <button class="button btn-filter is-checked" data-filter="*">Semua</button>
            @endif
            @foreach($masterProduct->categoryProduct as $item)
                <button class="button btn-filter" data-filter=".{{str_replace(')', '-', str_replace('(', '-', str_replace(' ', '-', $item->nama_id)))}}">
                    @if(Session::get('lang') == 'id')
                        {{$item->nama_id}}
                    @elseif(Session::get('lang') == 'en')
                        {{$item->nama_en}}
                    @endif
                </button>
            @endforeach
            </div>
        </div>

        <div class="row product-grid">
        @foreach($masterProduct->categoryProduct as $category)
            @foreach($category->product as $index => $item)
                @if(Session::get('lang') == $item->bahasa)
                <div class="col-sm-6 col-md-4 product-item {{str_replace(')', '-', str_replace('(', '-', str_replace(' ', '-', $item->categoryProduct->nama_id)))}}" data-category="{{str_replace(')', '-', str_replace('(', '-', str_replace(' ', '-', $item->categoryProduct->nama_id)))}}">
                    <a href="{{ route('app.product.show', ['id' => $item->id]) }}">
                        <div class="product-wrapper">
                            <div class="product-img" style="background-image: url('{{ $item->getThumbnail($item->content) }}');">
                                <!-- <img src="{{ $item->getThumbnail($item->content) }}" alt="Thumbnail" media-simple="true"> -->
                            </div>
                            <div class="product-box">
                                <h4 class="box-text box-title">
                                    {{$item->nama}}
                                </h4>
                                <p class="box-text box-detail">
                                    {{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 150)}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        @endforeach
        </div>
    </div>
</section>


@endsection

@section('footer')
    @include('layouts.app.partials.footer')
@endsection

@push('scripts')
    <script type="text/javascript" src="{{url('/')}}/js/isotope.pkgd.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript">
        var $grid = $('.product-grid').isotope({
            itemSelector: '.product-item',
            layoutMode: 'fitRows'

        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };
            // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });
    </script>

@endpush