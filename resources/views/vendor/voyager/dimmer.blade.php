<div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('{{ $image }}');">
    <div class="dimmer"></div>
    <div class="panel-content">
        @if (isset($icon))<i class='{{ $icon }}'></i>@endif
        @if (isset($title))<h4 class="widget-css">{!! $title !!}</h4>@endif
        @if (isset($text))<p class="widget-css">{!! $text !!}</p>@endif
        <a href="{{ $button['link'] }}" @if(isset($button['id'])) id="{{ $button['id'] }}" @endif  class="btn btn-primary  @if(isset($button['class'])) {{ $button['class'] }}" @endif">{!! $button['text'] !!}</a>
    </div>
</div>
