<nav class="primary-menu">
    <ul class="menu-container">
        @auth()
            <li class="menu-item custom-menu-my-account"><a class="menu-link" href="{{ route('client.profile') }}">
                    <div>My Account</div>
                </a>
            </li>
        @endauth


        <li class="menu-item"><a class="menu-link" href="{{ route('client.home') }}">
                <div>Home</div>
            </a>
        </li>

        <li class="menu-item"><a class="menu-link" href="{{ route('client.shop') }}">
                <div>Shop</div>
            </a></li>
        @foreach (App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->where('is_menu', 1)->get()
    as $parentCat)
            <li class="menu-item">
                <a class="menu-link" href="{{ route('client.category', $parentCat->slug) }} ">
                    <div>{{ $parentCat->name }}</div>
                </a>
                @php
                    $childcats = App\Models\ProductsCategoryModel::orderby('name', 'asc')
                        ->where('parent_id', $parentCat->id)
                        ->get();
                @endphp
                @if ($childcats->count() > 0)
                    <ul class="sub-menu-container">
                        @foreach ($childcats as $childCat)
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('client.category', $childCat->slug) }}">
                                    <div>{{ $childCat->name }}</div>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach


        <li class="menu-item"><a class="menu-link" href="{{ route('client.about') }}">
                <div>About</div>
            </a>
        </li>
        <li class="menu-item"><a class="menu-link" href="{{ route('client.blog') }}">
                <div>News Feed</div>
            </a>
        </li>


        <li class="menu-item"><a class="menu-link" href="{{ route('client.contact') }}">
                <div>Contact</div>
            </a>
        </li>

        @auth()
            <li class="menu-item d-sm-block d-md-none"><a onClick="return confirm('Are you sure you want to Logout?')" class="menu-link" href="{{ route('client.logout') }}">
                    <div>
                       <i class="text-danger icon-line-power mr-1 position-relative" style="top: 1px;"></i>Logout
                    </div>
                </a>
            </li>
        @endauth
    </ul>

</nav>
