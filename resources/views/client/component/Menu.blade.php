<nav class="primary-menu">

    <ul class="menu-container">
        <li class="menu-item"><a class="menu-link" href="{{route('client.home')}}">
                <div>Home</div>
            </a></li>

         @foreach (App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->where('is_menu', 1)  ->get()  as $parentCat)
        <li class="menu-item">
            <a class="menu-link" href="index.html">
                <div>Home</div>
            </a>
            <ul class="sub-menu-container">
                <li class="menu-item">
                    <a class="menu-link" href="intro.html#section-niche">
                        <div>Niche Demos</div>
                    </a>
                </li>
               
                 
            </ul>
        </li>
      @endforeach
        <li class="menu-item"><a class="menu-link" href="#">
                <div>About</div>
            </a></li>
        <li class="menu-item"><a class="menu-link" href="#">
                <div>Contact</div>
            </a></li>
    </ul>

</nav>
