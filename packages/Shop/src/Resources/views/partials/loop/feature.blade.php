@if ($product->flat->new)
<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
    @else
    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
        @endif

        <div class="product_image d-flex flex-column align-items-center justify-content-center">


            @if (empty($product->flat->thumbnail))
            <img src="{{ url( 'img/products/default.png') }}" alt="">
            @else
            <img src="{{ url( 'storage/' . $product->flat->thumbnail) }}" alt="">
            @endif

        </div>

        <div class="product_content">
            @if (empty($product->flat->special_price))
            <div class="product_price">{{ $product->flat->present_price }}</div>

            @else
            <div class="product_price discount">
                {{ presentPrice($product->flat->special_price) }}<span>{{ $product->flat->present_price }}</span>
            </div>

            @endif
            <div class="product_name">
                <div><a href="{{ url('store/'.$product->slug) }}">{{ Str::words($product->flat->name, 3, '') }}</a>
                </div>
            </div>
            <div class="product_extras">
                <div class="product_color">
                    <input type="radio" checked name="product_color" style="background:#b19c83">
                    <input type="radio" name="product_color" style="background:#000000">
                    <input type="radio" name="product_color" style="background:#999999">
                </div>
                <form action="{{ route('cart.store',$product)}}" method="POST">
                    @csrf
                    <button type="submit" class="product_cart_button">Add to
                        Cart</button>
                </form>

            </div>
        </div>
        <div class="product_fav"><i class="fas fa-heart"></i></div>

        <ul class="product_marks">
            <li class="product_mark product_discount">
                -{{ $product->flat->discount }}</li>
            <li class="product_mark product_new">new</li>
        </ul>
    </div>
</div>
