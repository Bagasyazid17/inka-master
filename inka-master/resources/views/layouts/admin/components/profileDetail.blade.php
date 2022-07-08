<div class="profile-detail">
    <div class="profile-info">
        @if (isset($title))
            <h4 class="heading">{{ $title or '' }}</h4>
            <hr></hr>
        @endif
        
        @if (isset($preBody))
            {{ $preBody }}
        @endif

        @if (isset($body))
            {{ $body or '' }}
        @endif
    </div>
    @if (isset($footer))
        <div class="text-center">
            {{ $footer or '' }}
        </div>
    @endif

    @if (isset($postFooter))
        {{ $postFooter }}
    @endif
</div>