<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">

        @if($templates)
        <div class="col-sm-9 col-sm-push-3">
            <h2 class="sidebar-title">Выбранный шаблон</h2>
            <div class="product-content-right">
                <div class="row">


                    <div class="col-sm-6">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img id="mainImage" src="{{asset('assets/images/'.$templates->img)}}" alt="photo" >
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-inner">
                            <h2 class="product-name">{{$templates->title}}</h2>
                            <div class="product-inner-price">
                                {{ $templates->price }}$
                            </div>



                            <div class="product-option-shop">

                                {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}

                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <input type="hidden" name="hid_id_title" id="hid_id_title" value={{$templates->id}}>

                                {!!  Form::button('В корзину',['class' => 'add_to_cart_button','id' => 'add_to_cart_button','onClick'=>'add_to_Cart() ']);!!}

                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" target="_blank" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ asset('templates/'.$templates->title.'/index.html') }}">Просмотр</a>
                                </div>

                                {!! Form::close() !!}

                            </div>




                            <div class="product-inner-category">
                                Категории: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoesqqq</a>.
                            </div>
                        </div>
                    </div>



                </div>



                <div class="related-products-wrapper">
                    <h2 class="related-products-title">Похожие шаблоны</h2>
                    <div class="related-products-carousel">
                        @foreach($similar_temp as $temp)
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{asset('assets/images/'.$temp->img)}} " alt="photo" class="single_photo" >
                                <div class="product-hover">
                                    <a href="{{route('single',$temp->id )}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Выбрать шаблон</a>
                                    <a target="_blank" rel="nofollow" href="{{ asset('templates/'.$temp->title.'/index.html') }}" class="view-details-link" ><i class="fa fa-link"></i> Просмотр </a>
                                </div>
                            </div>

                            <h2><a href="">{{ $temp->title }}</a></h2>

                            <div class="product-carousel-price">
                               Цена: <ins>{{ $temp->price }}$</ins>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>




            </div>
        </div>

@endif

        <div class="col-sm-3 col-sm-pull-9 single_search">
            <div class="single-sidebar">
                Поиск по тегу: путешествия, музыка, лендинг и др.
                {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}

                {!! Form::text('search_text','',['id' => 'name','placeholder' => 'Поиск']) !!}<br>
                {{--{!! Form::submit('поиск') !!}--}}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="hid_number" id="hidden_number" value="0">
                <input type="hidden" name="max_hid_number" id="max_hidden_number" value="0">
                {!!  Form::button('Найти',['onClick'=>'get_count_message()']);!!}
                {!!  Form::button('next',['id' => 'next','onClick'=>'nextMessage()']);!!}
                {!!  Form::button('prev',['id' => 'prev','onClick'=>'prevMessage()']);!!}


                {!! Form::close() !!}

            </div>

            <div class="alert alert-info">
                Совпадений не найдено
            </div>

             <div class="single-sidebar">
                 <h2 class="sidebar-title">Найденные шаблоны</h2>
                 <div class="thubmnail-recent  ">
                     <ul id="myList">
                     </ul>
                 </div>
             </div>




        </div>



    </div>
</div>
<script>



    //загружаю похожие шаблоны при загрузке страницы
    document.addEventListener("DOMContentLoaded", function(){
        var template_index_title = "<?php echo $templates->title ?>";
        refreshtem(template_index_title);

    });

    function hide_alert() {
        $(".alert-info").hide(3000);
    }

    function getMessage() {


        var elem_next = document.getElementById("next");
        elem_next.style.display = 'none';
        var elem_prev = document.getElementById("prev");
        elem_prev.style.display = 'none';

        $.ajax({
            url: '/single',
            method: 'post',
            data: { name: jQuery('#name').val(),hidden_number: jQuery('#hidden_number').val()},

            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

                //если пустой массив
                if(response.length==0)
                {
                    var alert_res = document.getElementsByClassName('alert-info');
                    alert_res[0].style.display = 'inline-block';
                    setTimeout(hide_alert,2000);
                }

                    response.forEach(function (entry) {
                        //  console.log(entry);

                        // var newItem0 = document.createElement("LI");
                        // //  newItem.append(' <a href="' + '1234' + '" title="' + '123' + '">Read more</a>');
                        // var textnode = document.createTextNode(entry['price']);
                        // newItem0.appendChild(textnode);
                        // var list = document.getElementById("myList");
                        // list.insertBefore(newItem0, list.childNodes[0]);
                        //
                        // var newItem = document.createElement("LI");
                        // var textnode = document.createTextNode(entry['title']);
                        // newItem.setAttribute("class", 'title_id');
                        //
                        // newItem.appendChild(textnode);
                        // var list = document.getElementById("myList");
                        // list.insertBefore(newItem, list.childNodes[1]);
                        //
                        // var newimg = document.createElement("img");
                        // newimg.setAttribute("src", "/assets/images/" + entry['img']);
                        // var list = document.getElementById("myList");
                        // list.insertBefore(newimg, list.childNodes[2]);


                        var newItem = document.createElement("div");
                        var textnode = document.createTextNode(entry['title']);
                        newItem.setAttribute("class", 'title_id');
                        //
                        newItem.appendChild(textnode);
                        var list = document.getElementById("myList");
                        list.insertBefore(newItem, list.childNodes[0]);


                        var newimg = document.createElement("img");
                        newimg.setAttribute("src", "/assets/images/" + entry['img']);
                        newimg.setAttribute("class", 'img_search');
                        var list = document.getElementById("myList");
                        list.insertBefore(newimg, list.childNodes[1]);



                    });

           // document.getElementById("hidden_number").value++;

//Делаю кликабельным название
                var all = document.getElementsByClassName('title_id');
                for(var i=0;i<all.length;i++)
                    all[i].onclick=function(){

                        refreshtem(this.innerHTML);
                       // this.innerHTML = 'New Text';
                    }

//делаю кликабельной картинку
                var all_img = document.getElementsByClassName('img_search');

                //
                for(var j=0; j<all_img.length; j++)

                    all_img[j].onclick=function(){

                        refreshtem(this.previousElementSibling.innerHTML);

                    }


            }
        })
    }

    function nextMessage() {
        document.getElementById("hidden_number").value++;
        delelem();
        getMessage();

        if((document.getElementById("hidden_number").value)==(document.getElementById("max_hidden_number").value)-1)
        {
            var elem_next = document.getElementById("next");
            elem_next.style.display = 'none';
        }
        if((document.getElementById("hidden_number").value)!=0)
        {
            var elem_prev = document.getElementById("prev");
            elem_prev.style.display = 'inline-block';
        }



    }

    function prevMessage() {
        if(        document.getElementById("hidden_number").value != 0) {
            document.getElementById("hidden_number").value--;
            delelem();
            getMessage();
        }
        if((document.getElementById("hidden_number").value)!=(document.getElementById("max_hidden_number").value)-1)
        {
            var elem_next = document.getElementById("next");
            elem_next.style.display = 'inline-block';
        }
        if((document.getElementById("hidden_number").value)==0)
        {
            var elem_prev = document.getElementById("prev");
            elem_prev.style.display = 'none';
        }


    }

    function delelem() {
      var mylist=  document.getElementById("myList");
        while (mylist.firstChild) {
            mylist.removeChild(mylist.firstChild);
        }
    }

    function del_similar_elem() {

        var mylist=  document.getElementById("similar_template_img");
        while (mylist.firstChild) {
            mylist.removeChild(mylist.firstChild);
        }

    }


    function countelem() {

            $.ajax({
                url: '/count_elem',
                method: 'post',
                data: {name: jQuery('#name').val()},
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function (response) {
                  //  console.log(response);
                    var max_number_trunc = response.length;
                    //выделяю целую часть
                    max_number_trunc = max_number_trunc / 4;
                    document.getElementById("max_hidden_number").value=Math.ceil(max_number_trunc);
                    if((document.getElementById("max_hidden_number").value)!=(0 || 1))
                    {
                        var elem_next = document.getElementById("next");
                        elem_next.style.display = 'inline-block';
                    }
                }
            })

        }

        //нажатие на кнопку
        function get_count_message() {
            document.getElementById("hidden_number").value = 0;
            delelem();
            countelem();
            getMessage();

        }

   function refreshtem( name_template) {

       $.ajax({
           url: '/refresh_template',
           method: 'post',
           data: {name: name_template},
           headers:
               {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
           success: function (response) {

               //главный шаблон страницы
               //  console.log(response);
               var main_img = document.getElementById('mainImage');
               main_img.setAttribute("src","/assets/images/"+response[0]['img']);

               var product_name = document.getElementsByClassName('product-name');
               product_name[0].innerHTML = response[0]['title'];

               var product_price = document.getElementsByClassName('product-inner-price');
               product_price[0].innerHTML = response[0]['price']+'$';

               //меняю цену в скрытом поле
               document.getElementById("hid_id_title").value =response[0]['id'];
                var category_all = 'Категории:';



               response[0]['categories'].forEach(function(category) {

                   category_all +=' '+category['title']+',';

               });

               category_all = category_all.slice(0,-1);
               var categories = document.getElementsByClassName('product-inner-category');
               categories[0].innerHTML = category_all;

               var show_template = document.getElementsByClassName('add_to_cart_button');
               {{ asset('templates/'.$temp->title.'/index.html') }}
               show_template[1].href = '../templates/'+ response[0]['title'] + '/index.html';

           }
       })

           }


   //похожие шаблоны
function similar_template(category_template) {
    $.ajax({
        url: '/similar_template',
        method: 'post',
        data: {name: category_template},
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function (response) {

        //   del_similar_elem();

            response.forEach(function(entry) {

                var newimg=document.createElement("img");
                newimg.setAttribute("src","/assets/images/"+entry['img']);
                var list = document.getElementById("similar_template_img");
                list.insertBefore(newimg, list.childNodes[0]);




                var newItem0 = document.createElement("LI");
                newItem0.setAttribute("class",'similar_title_id');
                var textnode = document.createTextNode(entry['title']);
                newItem0.appendChild(textnode);
                var sim_title = document.getElementById("similar_template_img");
                sim_title.insertBefore( newItem0, sim_title.childNodes[0]);

                var newItem = document.createElement("LI");
                var textnode = document.createTextNode(entry['price']);
                newItem.appendChild(textnode);
                var sim_title = document.getElementById("similar_template_img");
                sim_title.insertBefore(newItem,  sim_title.childNodes[0]);






            })

            var all = document.getElementsByClassName('similar_title_id');
            for(var i=0;i<all.length;i++)
                all[i].onclick=function(){

                    refreshtem(this.innerHTML);
                    // this.innerHTML = 'New Text';
                }

        }





    })
}

    function add_to_Cart() {

     var id_title =document.getElementById("hid_id_title").value;

        $.ajax({
            url: '/add_to_cart',
            method: 'post',
            data: { name: id_title},

            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

                // console.log(response);

                var cart_price = document.getElementsByClassName('cart-amunt');
                cart_price[0].innerHTML ='$ '+ response[1];

                var cart_count = document.getElementsByClassName('product-count');
                cart_count[0].innerHTML = response[0];

                var sim_title = document.getElementById('add_to_cart_button');
                sim_title.value='Добавлено';
                sim_title.innerHTML ='Добавлено';
                sim_title.disabled = true;

            }
        })
    }





</script>

<style>




    #next  {
        text-decoration: none;
        outline: none;
        display: inline-block;
        padding: 10px 30px;
        margin: 10px 20px;
        position: relative;
        overflow: hidden;
        border: 2px solid #fe6637;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
        color: #fe6637;
        transition: .2s ease-in-out;
    }
    #next:before {
        content: "";
        background: linear-gradient(90deg, rgba(255,255,255,.1), rgba(255,255,255,.5));
        height: 50px;
        width: 50px;
        position: absolute;
        top: -8px;
        left: -75px;
        transform: skewX(-45deg);
    }
    #next:hover {
        background: #fe6637;
        color: #fff;
    }
    #next:hover:before {
        left: 150px;
        transition: .5s ease-in-out;
    }

    #prev {
        text-decoration: none;
        outline: none;
        display: inline-block;
        padding: 10px 30px;
        margin: 10px 20px;
        position: relative;
        overflow: hidden;
        border: 2px solid #fe6637;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
        color: #fe6637;
        transition: .2s ease-in-out;
    }
    #prev:before {
        content: "";
        background: linear-gradient(90deg, rgba(255,255,255,.1), rgba(255,255,255,.5));
        height: 50px;
        width: 50px;
        position: absolute;
        top: -8px;
        left: -75px;
        transform: skewX(-45deg);
    }
    #prev:hover {
        background: #fe6637;
        color: #fff;
    }
    #prev:hover:before {
        left: 150px;
        transition: .5s ease-in-out;
    }

    #next {
        display: none;
    }
    #prev {
        display: none;
    }

    .alert-info {
        display: none;
    }

</style>