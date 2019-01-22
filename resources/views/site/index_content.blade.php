<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            @foreach($templates as $template)
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="{{asset('assets/images/'.$template->img)}}" alt="photo">
                </div>
                <h2><a href="">{{ $template->title }}</a></h2>
                <div class="product-carousel-price">
                    <ins>{{ $template->price }}$</ins>
                </div>

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">В корзину</a>
                </div>
            </div>
           @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav>
                    <ul class="pagination">
                        {{ $templates ->links('site.pagination') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>