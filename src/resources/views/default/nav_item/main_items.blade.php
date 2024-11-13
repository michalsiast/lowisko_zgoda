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

                <li class="dropdown-menu-parent {{ $isActive ? 'active' : '' }}">
                    <a href="{{ $url }}" class="main1" target="{{ $target }}">{{ $item->label }} <i class="fa-solid fa-angle-down"></i></a>
                    <ul>
                        @foreach($item->navItems as $subItem)
                            @php
                                $isActive = false;
                                $url = null;
                                $target = '_self';

                                if($subItem->page) {
                                    $url = route($subItem->page->type);
                                } else {
                                    $url = url()->to($subItem->url);
                                }

                                if($subItem->target) {
                                    $target = $subItem->target;
                                }

                                $isActive = request()->fullUrlIs($url);
                            @endphp

                            @if($subItem->navItems->count() > 0)
                                @php
                                    $columnClass = '';

                                    if ($item->navItems->count() > 20) {
                                        $columnClass = 'columns-3';
                                    } elseif ($item->navItems->count() > 10) {
                                        $columnClass = 'columns-2';
                                    }
                                @endphp
                                <li class="dropdown-submenu {{ $isActive ? 'active' : '' }}">
                                    <a href="{{ $url }}" target="{{ $target }}">{{ $subItem->label }} <i class="fa-solid fa-angle-right"></i></a>
                                    <ul class="{{ $columnClass }}">
                                        @foreach($subItem->navItems as $subSubItem)
                                            @php
                                                $isActive = false;
                                                $url = null;
                                                $target = '_self';

                                                if($subSubItem->page) {
                                                    $url = route($subSubItem->page->type);
                                                } else {
                                                    $url = url()->to($subSubItem->url);
                                                }

                                                if($subSubItem->target) {
                                                    $target = $subSubItem->target;
                                                }

                                                $isActive = request()->fullUrlIs($url);
                                            @endphp
                                            <li class="{{ $isActive ? 'active' : '' }}">
                                                <a href="{{ $url }}" target="{{ $target }}">{{ $subSubItem->label }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="{{ $isActive ? 'active' : '' }}">
                                    <a href="{{ $url }}" target="{{ $target }}">{{ $subItem->label }}</a>
                                </li>
                            @endif
                        @endforeach
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
