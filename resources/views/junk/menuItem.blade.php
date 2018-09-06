@foreach($items as $item)

    <li class="nav-item
        @if($item->hasChildren())
            dropdown
        @endif
        @if($item->children())
            dropdown-item
        @endif
            {{(\Illuminate\Support\Facades\URL::current() == $item->url()) ? "active-item" : ""}}
        ">
        <a class="nav-link
            @if($item->hasChildren())
                dropdown-toggle
            @endif
        " href="{{$item->url()}}"
        @if($item->hasChildren())
           id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        @endif

        >{{$item->title}}</a>
        @if($item->hasChildren())
            <ul class="dropdown-menu" aria-labelledby="yummyDropdown">
                @include(env('THEME').'.menuItem', ['items' =>$item->children()])
            </ul>
        @endif
    </li>
@endforeach