@php
    if (!isset($open)) {
        $open = "";
    }
@endphp
<li class="menu-item sub-menu">
    <a href="#">
        <span class="menu-icon">
            <i class="{{ $menu['icon'] }}"></i>
        </span>
        <span class="menu-title">{{ $menu['title'] }}</span>
    </a>
    <div class="sub-menu-list">
        <ul>
            @foreach($menu['sub'] as $m)
                <li class="menu-item">
                    <a href="{{ $m['link'] }}">
                        <span class="menu-title">{{ $m['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
