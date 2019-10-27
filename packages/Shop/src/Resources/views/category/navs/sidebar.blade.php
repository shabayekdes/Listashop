<div class="col-lg-3">

    <!-- Shop Sidebar -->
    <div class="shop_sidebar">
        <div class="sidebar_section">
            <div class="sidebar_title">Categories</div>

            <ul class="sidebar_categories">
                @foreach ($categories as $category)
                <li><a href="{{ url('store?category='.$category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar_section filter_by_section">
            <div class="sidebar_title">Filter By</div>
            <div class="sidebar_subtitle">Price</div>
            <div class="filter_price">
                <div id="slider-range" class="slider_range"></div>
                <p>Range: </p>
                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
            </div>
        </div>
        <div class="sidebar_section">
            <div class="sidebar_subtitle color_subtitle">Color</div>
            <ul class="colors_list">
                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                <li class="color"><a href="#" style="background: #000000;"></a></li>
                <li class="color"><a href="#" style="background: #999999;"></a></li>
                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
            </ul>
        </div>
        <div class="sidebar_section">
            <div class="sidebar_subtitle brands_subtitle">Brands</div>
            <ul class="brands_list">
                <li class="brand"><a href="#">Apple</a></li>
                <li class="brand"><a href="#">Beoplay</a></li>
                <li class="brand"><a href="#">Google</a></li>
                <li class="brand"><a href="#">Meizu</a></li>
                <li class="brand"><a href="#">OnePlus</a></li>
                <li class="brand"><a href="#">Samsung</a></li>
                <li class="brand"><a href="#">Sony</a></li>
                <li class="brand"><a href="#">Xiaomi</a></li>
            </ul>
        </div>
    </div>

</div>
