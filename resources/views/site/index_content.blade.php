<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">


            @foreach($templates as $template)
            <div class="single-shop-product">
                <div class="product-upper">
                    <a href="{{route('single',$template->id )}}"><img src="{{asset('assets/images/'.$template->img)}}" alt="photo"></a>
                </div>
                <h2><a href="{{route('single',$template->id )}}">{{ $template->title }}</a></h2>
                <div class="product-carousel-price">
                    <ins>{{ $template->price }}$</ins>
                </div>

                <div class="product-option-shop">

                    {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}

                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    {!!  Form::button('В корзину',['class' => 'add_to_cart_button','onClick'=>'add_to_Cart('.$template->id.') ']);!!}


                    {!! Form::close() !!}

                </div>
                <div class="product-option-shop">
                    <a class="add_to_cart_button" target="_blank" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ asset('teamplates/feast-master/index.html') }}">Просмотр</a>
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


<script>

    function add_to_Cart(title) {
        var id_title=title;

        $.ajax({
            url: '/add_to_cart',
            method: 'post',
            data: { name: id_title},

            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

                  console.log(response);
                // response.forEach(function(entry) {
                    //  console.log(entry);

                    // // var newItem = document.createElement("LI");
                    // var newItem0 = document.createElement("LI");
                    // //  newItem.append(' <a href="' + '1234' + '" title="' + '123' + '">Read more</a>');
                    // var textnode = document.createTextNode(entry['price']);
                    // newItem0.appendChild(textnode);
                    // var list = document.getElementById("myList");
                    // list.insertBefore(newItem0, list.childNodes[0]);
                    //
                    // var newItem = document.createElement("LI");
                    // var textnode = document.createTextNode(entry['title']);
                    // newItem.setAttribute("class",'title_id');
                    //
                    // newItem.appendChild(textnode);
                    // var list = document.getElementById("myList");
                    // list.insertBefore(newItem, list.childNodes[1]);
                    //
                    // var newimg=document.createElement("img");
                    // newimg.setAttribute("src","/assets/images/"+entry['img']);
                    // var list = document.getElementById("myList");
                    // list.insertBefore(newimg, list.childNodes[2]);

              //  });
                // document.getElementById("hidden_number").value++;

            }
        })
    }



</script>