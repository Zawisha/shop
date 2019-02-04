
Имя:
<?php
echo(\Illuminate\Support\Facades\Auth::user()->name);
?>
Мои заказы:
@if(isset($orders))


    <table cellspacing="0" class="shop_table cart">
        <thead>
        <tr>
            <th class="product-name">Название</th>
            <th class="product-price">Цена</th>
        </tr>

        </thead>
        @foreach($orders as $order)
            <tbody>

            <tr class="cart_item">

                <td class="product-name " >
                    <a href={{route('single',$order[0]->id)}}>{{ $order[0]->title }}</a>
                </td>
                <td class="product-price ">
                    <span class="amount">${{ $order[0]->price}}</span>
                </td>

            </tr>

            </tbody>
        @endforeach
    </table>

    @endif
