@extends('layouts.app.app')

@section('title')
    @if(Session::get('lang') == 'id')
        <title>INKA - Hubungi Kami</title>
    @elseif(Session::get('lang') == 'en')
        <title>INKA - Contact Us</title>
    @endif
@endsection

@section('content')
<section class="mbr-section content4 cid-qDtEGppajZ" id="content4-16" data-rv-view="1887">
    <div class="global-title">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-12">
                    <h2 class="pb-3 mbr-fonts-style display-2">
                    @if(Session::get('lang') == 'id')
                        Hubungi Kami
                    @elseif(Session::get('lang') == 'en')
                        Contact Us
                    @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section form1 cid-qDtG0LrXWG contact-us" id="form1-1l" data-rv-view="1919">
     <div class="container">
        <div class="row justify-content-center">


            @if(Session::get('lang') == 'id')
            <div class="title col-6 col-lg-6">
                <h4>PT INDUSTRI KERETA API (Persero)</h4>
                <h5>Kantor Pusat</h5>
                <p>Jl. Yos Sudarso No. 71 Madiun 63122, Jawa Timur</p>
                <p>Telp. (0351) 452271-74, Fax (0351) 452275</p>
                <p>Email:</p>
                <p>- Hubungan Perusahaan: sekretariat@inka.co.id</p>
                <p>- Bisnis & Pemasaran: marketing@inka.co.id</p>
            </div>
            <div class="title col-6 col-lg-6">
                <h4 style="line-height: 0.85rem; display: inline-block;"></h4>
                <h5>Kantor Perwakilan</h5>
                <p>Menara Taspen Lt. 3</p>
                <p>Jl. Jend. Sudirman Kav.2 Jakarta</p>
                <p>Telp. (021) 2514424, Fax (021) 2514423</p>
                <p>Email: inkajkt@inka.co.id</p>
                
            </div>
            @elseif(Session::get('lang') == 'en')
            <div class="title col-6 col-lg-6">
                <h4>PT INDUSTRI KERETA API (Persero)</h4>
                <h5>Head Office</h5>
                <p>Jl. Yos Sudarso No. 71 Madiun 63122, Jawa Timur</p>
                <p>Telp. (+62) 351 452271-74, Fax (+62) 351 452275</p>
                <p>Email:</p>
                <p>- General Affair & General Inquiries : sekretariat@inka.co.id</p>
                <p>- Marketing & Bussiness : marketing@inka.co.id</p>
            
            </div>
            <div class="title col-6 col-lg-6">
                <h4 style="line-height: 0.85rem; display: inline-block;"></h4>
                <h5>Representative Office</h5>
                <p>Taspen Building, 3rd Floor</p>
                <p>Jl. Jend. Sudirman Kav.2 Jakarta</p>
                <p>Telp. (+62) 21 2514424, Fax (+62) 21 2514423</p>
                <p>Email: inkajkt@inka.co.id</p>
            </div>
            @endif
            
        </div>
    </div> 
    <div class="container">
        <div class="contact-filter">
            <div class="topik-filter">
                @foreach($topik as $index => $item)
                        <a class="button btn-topik @if($index == 0) topik-active @endif" id-topik="{{$item->id}}">
                            @if(Session::get('lang') == 'id')
                                {{$item->nama_id}}
                            @elseif(Session::get('lang') == 'en')
                                {{$item->nama_en}}
                            @endif
                        </a>
                @endforeach
            </div>
            <div class="sub-topik-filter">
                <select class="form-control" name="sub_topik" data-form-field="int" required="" placeholder="Sub Topik">
                </select>
                
            </div>
        </div>

        <div class="row justify-content-center" style="min-height:25vh;">
            <div class="media-container-column col-lg-10">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
            
                    <!-- <form class="mbr-form" method="POST" action="{{route('app.contact.store')}}"> -->
                    {!! Form::open(['method' => 'POST','route' => ['app.contact.store'], 'class' => 'mbr-form']) !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="sub_topik_id" value="">
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-1l">
                                        @if(Session::get('lang') == 'id')
                                            Nama
                                        @elseif(Session::get('lang') == 'en')
                                            Name
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" name="nama" data-form-field="Name" required="" id="name-form1-1l"
                                        @if(Session::get('lang') == 'id')
                                            placeholder="Nama" 
                                        @elseif(Session::get('lang') == 'en')
                                            placeholder="Name" 
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-1l">Email</label>
                                    <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-1l" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-1l">
                                        @if(Session::get('lang') == 'id')
                                            Telepon
                                        @elseif(Session::get('lang') == 'en')
                                            Phone
                                        @endif
                                    </label>
                                    <input type="number" class="form-control" name="telepon" data-form-field="Phone" id="phone-form1-1l"
                                        @if(Session::get('lang') == 'id')
                                            placeholder="Telepon"
                                        @elseif(Session::get('lang') == 'en')
                                            placeholder="Phone" 
                                        @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" data-for="message">
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-1l">
                                @if(Session::get('lang') == 'id')
                                    Pesan
                                @elseif(Session::get('lang') == 'en')
                                    Message
                                @endif
                            </label>
                            <textarea type="text" class="form-control" name="content" rows="7" data-form-field="Message" id="message-form1-1l"

                                @if(Session::get('lang') == 'id')
                                    placeholder="Pesan" 
                                @elseif(Session::get('lang') == 'en')
                                    placeholder="Message" 
                                @endif>        
                            </textarea>
                        </div>
            
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-form display-4" id="form-sumbit">
                                @if(Session::get('lang') == 'id')
                                    KIRIM
                                @elseif(Session::get('lang') == 'en')
                                    SEND
                                @endif
                            </button>
                        </span>
                    {!! Form::close() !!}
                    <!-- </form> -->
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
        $('.mbr-form').hide();
        var url = '{{ route("app.contact.sub-topik", ['id'=>":id"]) }}';
        url = url.replace(':id', $('.topik-active').attr('id-topik'));
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="sub_topik"]').empty();
                @if(Session::get('lang') == 'id')
                    $('select[name="sub_topik"]').append('<option value="" selected>Pilih Sub Topik</option>');
                @elseif(Session::get('lang') == 'en')
                    $('select[name="sub_topik"]').append('<option value="" selected>Choose Sub Topic</option>');
                @endif

                data.forEach(function(item) {
                    @if(Session::get('lang') == 'id')
                        $('select[name="sub_topik"]').append('<option value="'+item['id']+'">'+item['nama_id']+'</option>');
                    @elseif(Session::get('lang') == 'en')
                        $('select[name="sub_topik"]').append('<option value="'+item['id']+'">'+item['nama_en']+'</option>');
                    @endif
                });
            }
        });

        $(document).ready(function() {
            $('.btn-topik').on('click', function() {
                $('.btn-topik').removeClass('topik-active');
                $(this).addClass('topik-active');

                var topik_id = $(this).attr('id-topik');
                url = '{{ route("app.contact.sub-topik", ['id'=>":id"]) }}';
                url = url.replace(':id', topik_id);
                $('.mbr-form').hide();
                
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="sub_topik"]').empty();
                        @if(Session::get('lang') == 'id')
                            $('select[name="sub_topik"]').append('<option value="" selected>Pilih Sub Topik</option>');
                        @elseif(Session::get('lang') == 'en')
                            $('select[name="sub_topik"]').append('<option value="" selected>Choose Sub Topic</option>');
                        @endif

                        data.forEach(function(item) {
                            @if(Session::get('lang') == 'id')
                                $('select[name="sub_topik"]').append('<option value="'+item['id']+'">'+item['nama_id']+'</option>');
                            @elseif(Session::get('lang') == 'en')
                                $('select[name="sub_topik"]').append('<option value="'+item['id']+'">'+item['nama_en']+'</option>');
                            @endif
                        });
                    }
                });
            });

            $('select[name="sub_topik"]').on('change', function() {
                if($(this).val()){
                    $('input[name="sub_topik_id"]').val($(this).val());
                    $('.mbr-form').show();
                }
                else{
                    $('.mbr-form').hide();
                }
            });

            $('#form-submit').on('click', function(){
                console.log('hey');
                $('.mbr-form').submit();
            });
        });
    </script>
@endpush