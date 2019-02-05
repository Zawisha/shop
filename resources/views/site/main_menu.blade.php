<div class="container">





    <div class="row">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="nav"  >
                {{--class="active"--}}
                <li ><a href="{{ route('index') }}">Главная</a></li>
                <li><a  href="{{ url('/single/1') }}">Один шаблон</a></li>
                <li><a href="{{ route('cart') }}">Корзина</a></li>
                <li><a href="{{ route('contact') }}">Контакты</a></li>
            </ul>
        </div>
    </div>


</div>

<script>


       // document.getElementById("nav").getElementByTagName("li")['1'].classList.add("active");
//var t =  document.getElementById("nav").getElementsByTagName("li")['1'].classList.add("active");
        var navelem = document.getElementById('nav');
        var elements = navelem.getElementsByTagName('li');



       // console.log(elements);
     var pathArray = location.pathname.split( '/' );
     var protocol = pathArray[1];

    //
     switch( protocol )
     {
         case "":
             elements[0].setAttribute("class",'active');
             break;

         case "single":
             elements[1].setAttribute("class",'active');
             break;

         case "cart":
             elements[2].setAttribute("class",'active');
             break;

         case "contact":
             elements[3].setAttribute("class",'active');
             break;


     }

    // $($("#nav li")[2]).addClass("active");

    </script>