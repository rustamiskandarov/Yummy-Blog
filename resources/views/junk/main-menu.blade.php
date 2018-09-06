@if($menu)
    <ul class="navbar-nav" id="yummy-nav">
        @include(env('THEME').'.menuItem', ['items' =>$menu->roots()])
    </ul>
@endif

