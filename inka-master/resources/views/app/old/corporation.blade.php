@extends('layouts.app.master')

@section('title')
    <title>INKA - {{$corporation->nama}}</title>
@endsection

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$corporation->nama}}</h2>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section class="single-post">
    <div class="container"> 
        @if($corporation->has_sub == 1)
        <div class="row corpotaion-tab-wrapper">
            @foreach($corporation->childCorporation as $index => $item)
            <div class="col-sm-3">
                <div class="corpotaion-tab" href="child-{{$index}}">
                    {{ $item->nama }}
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                @if($corporation->has_sub == 0)
                <div class="post-content">
                    {!! $corporation->content !!}
                </div>
                @elseif($corporation->has_sub == 1)
                    @foreach($corporation->childCorporation as $index => $item)
                    <div class="post-content corporation-child" id="child-{{$index}}">
                        {!! $item->content !!}
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
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