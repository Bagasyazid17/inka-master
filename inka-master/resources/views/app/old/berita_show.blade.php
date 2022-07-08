@extends('layouts.app.master')

@section('title')
    <title>Berita INKA - {{$berita->judul}}</title>
@endsection

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$berita->judul}}</h2>
                    {{-- <div class="portfolio-meta">
                        <span>{{$berita->created_at}}</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section class="single-post">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="post-img">
                    <img class="img-responsive" alt="" src="{{url('/')}}/{{ $berita->thumbnail }}">
                </div> -->
                <div class="post-content">
                    {!! $berita->content !!}
                </div>
                <ul class="social-share">
                    <h4>Share this article</h4>
                    <li>
                        <a href="#" class="Facebook">
                            <i class="ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="Twitter">
                            <i class="ion-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="Linkedin">
                            <i class="ion-social-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="Google Plus">
                            <i class="ion-social-googleplus"></i>
                        </a>
                    </li>
                    
                </ul>
                
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cke_editable_inline').removeAttr('title');
        });
    </script>
@endpush