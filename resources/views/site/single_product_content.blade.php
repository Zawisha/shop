

<div class="zigzag-bottom"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="single-sidebar">
                {!! Form::open(['url'=>route('single','1'),'method'=>'POST',  'name' => 'validateform']) !!}
                {!! Form::text('search_text','',['id' => 'name']) !!}<br>
                {{--{!! Form::submit('поиск') !!}--}}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="hid_number" id="hidden_number" value="0">
                <input type="hidden" name="max_hid_number" id="max_hidden_number" value="0">
                {!!  Form::button('Replace Message',['onClick'=>'get_count_message()']);!!}
                {!!  Form::button('next',['id' => 'next','onClick'=>'nextMessage()']);!!}
                {!!  Form::button('prev',['id' => 'prev','onClick'=>'prevMessage()']);!!}


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
                                <img id="mainImage" src="{{asset('assets/images/'.$templates->img)}}" alt="photo">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-inner">
                            <h2 class="product-name">{{$templates->title}}</h2>
                            <div class="product-inner-price">
                                {{ $templates->price }}$
                            </div>

                            <form action="" class="cart">
                                <button class="add_to_cart_button" type="submit">В корзину</button>
                            </form>
                            <div class="product-inner-category">
                                Категории: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-products-wrapper">
                    <h2 class="related-products-title">Похожие шаблоны</h2>
                    <div class="related-products-carousel">
                        <div class="single-product">
                            <div class="product-f-image ">
                                <ul id="similar_template_img">
                                </ul>
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
            data: { name: jQuery('#name').val(),hidden_number: jQuery('#hidden_number').val()},

            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {

              //  console.log(response);
                response.forEach(function(entry) {
                  //  console.log(entry);

                // var newItem = document.createElement("LI");
                var newItem0 = document.createElement("LI");
                  //  newItem.append(' <a href="' + '1234' + '" title="' + '123' + '">Read more</a>');
                var textnode = document.createTextNode(entry['price']);
                newItem0.appendChild(textnode);
                var list = document.getElementById("myList");
                list.insertBefore(newItem0, list.childNodes[0]);

                var newItem = document.createElement("LI");
                var textnode = document.createTextNode(entry['title']);
                    newItem.setAttribute("class",'title_id');

                    newItem.appendChild(textnode);
                var list = document.getElementById("myList");
                list.insertBefore(newItem, list.childNodes[1]);

                var newimg=document.createElement("img");
                newimg.setAttribute("src","/assets/images/"+entry['img']);
                var list = document.getElementById("myList");
                list.insertBefore(newimg, list.childNodes[2]);

            });
           // document.getElementById("hidden_number").value++;


                var all = document.getElementsByClassName('title_id');
                for(var i=0;i<all.length;i++)
                    all[i].onclick=function(){

                        refreshtem(this.innerHTML);
                       // this.innerHTML = 'New Text';
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

                var category_all = 'Категории:';



               response[0]['categories'].forEach(function(category) {

                   category_all +=' '+category['title']+',';

               });
               category_all = category_all.slice(0,-1);
               var categories = document.getElementsByClassName('product-inner-category');
               categories[0].innerHTML = category_all;

               //передаю массив с объектами категорий
              // console.log(response[0]['categories']);
               similar_template(response[0]['categories']);

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

           del_similar_elem();

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

</style>