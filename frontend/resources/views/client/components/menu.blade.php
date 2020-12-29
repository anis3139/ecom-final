<!-- menu -->
<section id="menu" style="position: sticky !important; top:0px !important;">
    <div class="container" >
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{ route('client.home') }}">Home</a></li>

             @foreach(App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', 0)->get() as $parentCat)
              <li><a href="{{$parentCat->slug}} ">{{$parentCat->name}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  @foreach (App\Models\ProductsCategoryModel::orderby('name', 'asc')->where('parent_id', $parentCat->id)->get() as $childCat)
                  <li><a href="{{$childCat->slug}}">{{$childCat->name}}</a></li>
                  @endforeach

                </ul>
              </li>
              @endforeach


            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->
