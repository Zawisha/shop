<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="logo">
                <h1><a href="/"><img  src="{{asset('assets/img/logo.png')}} "></a></h1>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="shopping-item">
                <a href="{{route('cart')}}">Cart - <span class="cart-amunt">$

                        @if (session('price'))
                            {{ session('price') }}
                        @else
                            0
                        @endif


                    </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">

                        @if (session('count'))
                         {{ session('count') }}
                        @else
                            0
                        @endif
                        </span>
                </a>
            </div>
        </div>
    </div>
</div>