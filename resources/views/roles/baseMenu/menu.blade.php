@if (!isset($innerLoop))
    <ul class="nav navbar-nav">
@endif

@php

if (Voyager::translatable($items)) {
    $items = $items->load('translations');
}
@endphp

@foreach ($items as $item)
    @php
        
        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }
        
        $listItemClass = null;
        $linkAttributes = null;
        $styles = null;
        $icon = null;
        $caret = null;
        
        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:' . $item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:' . $item->color;
        }
        
        // With Children Attributes
        if (!$originalItem->children->isEmpty()) {
            $linkAttributes = 'class="dropdown-toggle" data-toggle="dropdown"';
            $caret = '<span class="caret"></span>';
        
            if (url($item->link()) == url()->current()) {
                $listItemClass = 'dropdown active';
            } else {
                $listItemClass = 'dropdown';
            }
        }
        
        // Set Icon
        // if(isset($options->icon) && $options->icon == true){
        $icon = '<span class="icon ' . $item->icon_class . '"></span>';
        // }
    @endphp

    <li class="{{ $listItemClass }}">

        @if (count($item->children) <= 0)
            <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}"
                {!! $linkAttributes ?? '' !!}>
                {!! $icon !!}
                <span class="s2 title">{{ $item->title }}</span>
                {!! $caret !!}
            </a>
        @else
            <a href="#<?php echo $item->id; ?>-dropdown-element" target="{{ $item->target }}" style="{{ $styles }}"
                data-toggle="collapse" aria-expanded="false">
                {!! $icon !!}
                <span class="s2 title">{{ $item->title }}</span>
            </a>
        @endif

        @if (!$originalItem->children->isEmpty())
            <div id='<?php echo $item->id; ?>-dropdown-element' class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        @foreach ($originalItem->children as $menu_itemc)
                            @php
                                $icon = '<span class="icon ' . $menu_itemc->icon_class . '"></span>';
                            @endphp
                            <li><a href="{{ $menu_itemc->url }}">{!! $icon !!}{{ $menu_itemc->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </li>
@endforeach

</ul>
