<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="single-sidebar">
                <h2 class="sidebar-title">Search Products</h2>
                <form action="">
                    <input type="text" placeholder="Search products...">
                    <input type="submit" value="Search">
                </form>
            </div>

            <div class="single-sidebar">
                <h2 class="sidebar-title">Шаблоны</h2>
                <div class="thubmnail-recent">
                    <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                    <h2><a href="">Sony Smart TV - 2015</a></h2>
                    <div class="product-sidebar-price">
                        <ins>$700.00</ins>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-8">
            <div class="product-content-right">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img src="{{asset('assets/images/'.$templates->img)}}" alt="photo">
                            </div>

                            {{--<div class="product-gallery">--}}
                                {{--<img src="img/product-thumb-1.jpg" alt="">--}}
                                {{--<img src="img/product-thumb-2.jpg" alt="">--}}
                                {{--<img src="img/product-thumb-3.jpg" alt="">--}}
                            {{--</div>--}}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-inner">
                            <h2 class="product-name">{{$templates->title}}</h2>
                            <div class="product-inner-price">
                                <ins>{{ $templates->price }}$</ins>
                            </div>

                            <form action="" class="cart">
                                <button class="add_to_cart_button" type="submit">В корзину</button>
                            </form>
                            <div class="product-inner-category">
                                <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-products-wrapper">
                    <h2 class="related-products-title">Похожие шаблоны</h2>
                    <div class="related-products-carousel">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-1.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>

                            <h2><a href="">Sony Smart TV - 2015</a></h2>

                            <div class="product-carousel-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

