
Имя:
<?php
echo(\Illuminate\Support\Facades\Auth::user()->name);
?>
Мои заказы:
@if(isset($orders))

    @foreach($orders as $order)

        {{ $order[0]->title }}
        {{ $order[0]->price }}

    @endforeach



    @endif
