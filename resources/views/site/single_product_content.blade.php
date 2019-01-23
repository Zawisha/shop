

<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="single-sidebar">
                {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}
                {!! Form::text('search_text','',['id' => 'name']) !!}<br>
                {{--{!! Form::submit('поиск') !!}--}}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                {!!  Form::button('Replace Message',['onClick'=>'getMessage()']);!!}
                {!! Form::close() !!}

            </div>

            <div class="single-sidebar">
                <h2 class="sidebar-title">Шаблоны</h2>

                <div class="thubmnail-recent">
                    <ul id="myList">
                    </ul>
                    {{--<img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">--}}
                    {{--<h2><a href="">Sony Smart TV - 2015</a></h2>--}}
                    {{--<div class="product-sidebar-price">--}}
                        {{--<ins>$700.00</ins>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>

        @if($templates)
        <div class="col-md-8">
            <div class="product-content-right">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img src="{{asset('assets/images/'.$templates->img)}}" alt="photo">
                            </div>
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
@endif
    </div>
</div>
<script>

    function getMessage() {

        $.ajax({
            url: '/single',
            method: 'post',
            data: { name: jQuery('#name').val()},
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

                console.log(response);
                response.forEach(function(entry) {
                    console.log(entry);

                // var newItem = document.createElement("LI");
                var newItem = document.createElement("LI");
                var textnode = document.createTextNode(entry['price']);
                newItem.appendChild(textnode);
                var list = document.getElementById("myList");
                list.insertBefore(newItem, list.childNodes[0]);

                var newItem = document.createElement("LI");
                var textnode = document.createTextNode(entry['title']);
                newItem.appendChild(textnode);
                var list = document.getElementById("myList");
                list.insertBefore(newItem, list.childNodes[1]);

                var newimg=document.createElement("img");
                newimg.setAttribute("src","/assets/images/1.png");
                var list = document.getElementById("myList");
                list.insertBefore(newimg, list.childNodes[2]);

            });

            }
        })
    }
</script>