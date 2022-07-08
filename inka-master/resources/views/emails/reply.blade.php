@component('mail::message')
# {{ $receiver }}, <br>

{!! $content !!}
<br>
Thanks,<br>
{{ $sender }}<br>
PT INKA (Persero)
<img src="{{url('/')}}/assets/logo/logo-md.png" style="width: 30%; max-width: 150px;">
@endcomponent
