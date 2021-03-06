<div class="zigzag-bottom"></div>
  <div class="container">


      <div class="row ">
          <div class="col-12 col-sm-3 ">

    {!! Form::open(['url'=>route('index'),'method'=>'get']) !!}
<span class="custom-dropdown big">
    <select name="template_category">
        <option value="0" @if(session('find')=='0'){!! "selected" !!}  ;} @endif>Все категории</option>
        @foreach($category as $cat)
        <option value="{{ $cat->id }}" @if(session('find')==$cat->id){!! "selected" !!}  ;} @endif>{{ $cat->title }}</option>
        @endforeach
    </select>
</span>
          </div>
              <div class="col-12 col-sm-8 " id="find_button">
    {!! Form::submit('Найти',['id' =>'mybutton','class'=>'btn']) !!}

    {!! Form::close() !!}
              </div>
      </div>


      <div class="row">
    @foreach($templates as $template)

        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <a href="{{route('single',$template->id )}}"><img src="{{asset('assets/images/'.$template->img)}}" alt="photo" class="index_photo"></a>
                </div>
                <h2><a href="{{route('single',$template->id )}}">{{ $template->title }}</a></h2>
                <div class="product-carousel-price">
                    <ins>{{ $template->price }}$</ins>
                </div>

                <div class="product-option-shop">

                    {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}

                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    {!!  Form::button('В корзину',['class' => 'add_to_cart_button','id' =>$template->id,'onClick'=>'add_to_Cart('.$template->id.') ']);!!}


                    {!! Form::close() !!}

                </div>
                <div class="product-option-shop">
                    <a class="add_to_cart_button" target="_blank" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ asset('templates/'.$template->title.'/index.html') }}">Просмотр</a>
                </div>
            </div>
        </div>
          @endforeach
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
</div>


<script>


    document.addEventListener("DOMContentLoaded", function(){
<?php

    foreach ($cart as $cart_id)

    {
        ?>

        var arr = "<?php echo $cart_id ?>";

        var sim_title = document.getElementById(arr);
        sim_title.value='Добавлено';
        sim_title.innerHTML ='Добавлено';
        sim_title.disabled = true;
        <?php
    }

    ?>

    });




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

                  //console.log(response);


                    var cart_price = document.getElementsByClassName('cart-amunt');
                    cart_price[0].innerHTML ='$ '+ response[1];

                   var cart_count = document.getElementsByClassName('product-count');
                   cart_count[0].innerHTML = response[0];

                var sim_title = document.getElementById(id_title);
                sim_title.value='Добавлено';
                sim_title.innerHTML ='Добавлено';
                sim_title.disabled = true;


            }
        })
    }



</script>


