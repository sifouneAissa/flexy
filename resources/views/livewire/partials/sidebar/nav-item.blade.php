<li class="{{$item->is_nav_item() ? 'nav-item' : ''}} {{$item->is_drop_down() ? 'dropdown' : ''}} {{\Request::route()->getName() === $item->route ? 'show' : ''}}">
    <a class="nav-link {{$item->is_drop_down()  ? 'dropdown-toggle' : ''}} {{!$item->is_nav_item() ? 'dropdown-item' : ''}} {{($item->children->contains(fn ($c) => $c->route === \Request::route()->getName()) || (\Request::route()->getName() === $item->route)) ? 'show' : ''}}"
       @if($item->is_drop_down() )
       data-bs-toggle="dropdown"
       href="#"
       role="button"
       aria-expanded="false"
       @else
       href="{{route($item->route)}}"
       @endif
        tabindex="-1">
        <div class="avatar avatar-40 icon"><i class="bi {{$item->icon}}"></i></div>
        <div class="col">{{$item->name}} @if($item->isNew) <span class="badge bg-info fw-light">new</span> @endif</div>
        @if($item->is_drop_down()) <div class="arrow"><i class="bi bi-chevron-right"></i></div>@endif
{{--            <i class="bi bi-chevron-up minus"></i>--}}

    </a>

   @if($item->is_drop_down())
        <ul class="dropdown-menu {{$item->children->contains(fn ($c) => $c->route === \Request::route()->getName()) ? 'show' : ''}}" >
            @foreach($item->children as $child)
                <livewire:partials.sidebar.nav-item  :item="$child" />
            @endforeach
        </ul>
    @endif
</li>
