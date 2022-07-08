<div class="panel panel-headline">
	@if (isset($title))
    <div class="panel-heading">
        <h3 class="panel-title">
        	{{ $title or '' }}
        </h3>
    </div>
    @endif

    @if (isset($preBody))
        {{ $preBody }}
    @endif

    @if (isset($body))
    <div class="panel-body">
    	{{ $body or '' }}
    </div>
    @endif

    @if (isset($footer))
	    <div class="panel-footer">
	    	{{ $footer or '' }}
	    </div>
    @endif

    @if (isset($postFooter))
        {{ $postFooter }}
    @endif
</div>