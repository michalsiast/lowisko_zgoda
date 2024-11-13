@if($items->count() > 0)
    <ul>
        @foreach($items as $item)
            @php
                $isActive = false;
                $url = null;
                $target = '_self';

                if($item->page) {
                    $url = route($item->page->type);
                } else {
                    $url = url()->to($item->url);
                }

                if($item->target) {
                    $target = $item->target;
                }

                $isActive = request()->fullUrlIs($url);
            @endphp

            @if($item->navItems->count() > 0)
                <li class="dropdown-menu-parrent {{ $isActive ? 'active' : '' }}">
                    <a href="{{ $url }}" class="main1" target="{{ $target }}">{{ $item->label }} <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        @php
                            $halfway = ceil($item->navItems->count() / 2);
                            $firstColumn = $item->navItems->take($halfway);
                            $secondColumn = $item->navItems->slice($halfway);
                        @endphp
                        <div class="submenu-columns">
                            <div class="submenu-column">
                                @foreach($firstColumn as $subItem)
                                    <li>
                                        <a href="{{ $subItem->page ? route($subItem->page->type) : url()->to($subItem->url) }}" target="{{ $subItem->target ?? '_self' }}">
                                            {{ $subItem->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                            <div class="submenu-column">
                                @foreach($secondColumn as $subItem)
                                    <li>
                                        <a href="{{ $subItem->page ? route($subItem->page->type) : url()->to($subItem->url) }}" target="{{ $subItem->target ?? '_self' }}">
                                            {{ $subItem->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </li>
            @else
                <li class="{{ $isActive ? 'active' : '' }}">
                    <a href="{{ $url }}" class="list-group-item list-group-item-action" target="{{ $target }}">{{ $item->label }}</a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
