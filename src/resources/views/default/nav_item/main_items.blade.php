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
                    <ul>
                        @php
                            $halfway = ceil($item->navItems->count() / 2);
                            $index = 0;
                        @endphp
                        <div style="display: flex;">
                            <div style="flex: 1;">
                                @foreach($item->navItems as $subItem)
                                    @if($index == $halfway)
                            </div>
                            <div style="flex: 1;">
                                @endif
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
                                <li class="{{ $isActive ? 'active' : '' }}">
                                    <a href="{{ $url }}" target="{{ $target }}">{{ $subItem->label }}</a>
                                </li>
                                @php $index++; @endphp
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
