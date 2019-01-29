<div class="zigzag-bottom"></div>
<div class="container">

    @if(isset($cart_result))

    <div class="row">





        <div class="col-md-8">
            <div class="product-content-right">
                <div class="woocommerce">

                    {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                        <table cellspacing="0" class="shop_table cart">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                            </tr>

                            </thead>
                            @foreach($cart_result as $cart0)
                            <tbody>

                            <tr class="cart_item" id="{{ $cart0[0]->id  }}">
                                <td class="product-remove ">
                                    {!!  Form::button('Удалить',['class' => 'add_to_cart_button','onClick'=>'remove_template('.$cart0[0]->id.') ']);!!}
                                </td>

                                <td class="product-name " >
                                    <a href="single-product.html">{{ $cart0[0]->title }}</a>
                                </td>

                                <td class="product-price ">
                                    <span class="amount">${{ $cart0[0]->price}}</span>
                                </td>

                            </tr>

                            </tbody>
                            @endforeach
                        </table>
                    {!! Form::close() !!}



                    <div class="cart-collaterals">


                        <div class="cart_totals ">
                            <h2>Cart Totals</h2>

                            <table cellspacing="0">
                                <tbody>

                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount" id="total_price">

                                               @if (session('price'))
                                                    {{ session('price') }}
                                                @else
                                                    0
                                                @endif
                                                $
                                            </span></strong> </td>
                                </tr>
                                <tr>
                                    <td class="actions" colspan="6">
                                        <input type="submit" value="Заказать" name="proceed" class="checkout-button button alt wc-forward">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
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
    function remove_template(title)    {
        var id_title=title;
//удаление элемента по id
        var elem_id = document.getElementById(id_title);
        elem_id.parentNode.removeChild(elem_id);

        $.ajax({
            url: '/delete_from_cart',
            method: 'post',
            data: { name: id_title},

            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

               // console.log(response);

                if(response!='no items') {
                    var cart_price = document.getElementsByClassName('cart-amunt');
                    cart_price[0].innerHTML = '$ ' + response[0];

                    var cart_count = document.getElementsByClassName('product-count');
                    cart_count[0].innerHTML = response[1];

                    var total_price = document.getElementById('total_price');
                    total_price.innerHTML = '$ ' + response[0];
                }
                else
                {
                    var cart_price = document.getElementsByClassName('cart-amunt');
                    cart_price[0].innerHTML = '$ ' + 0;

                    var cart_count = document.getElementsByClassName('product-count');
                    cart_count[0].innerHTML = 0;

                    var total_price = document.getElementById('total_price');
                    total_price.innerHTML = '$ ' + 0;
                }


            }
        })


    }
    </script>

