

@if(isset($errors)&&(!empty($errors)))
    <div class="alert-danger" >
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::open(['url'=>route('add'), 'class' =>'form-horizontal','method'=>'POST', 'onsubmit'=>'return validatefunc()', 'name' => 'validateform','enctype'=>'multipart/form-data']) !!}

{{ csrf_field() }}

{!! Form::label('Название шаблона') !!}
{!! Form::text('title',old('title'),['id' => 'hold_title']) !!}<br>


{!! Form::label('Псевдоним') !!}
{!! Form::text('alias',old('alias'),['id' => 'hold_alias']) !!}<br>


{!! Form::label('Цена') !!}
{!! Form::text('price',old('price'),['id' => 'hold_price']) !!}<br>


{!! Form::file('img',['class' =>'filestyle']); !!}<br>
{!! Form::submit('Добавить',['id' =>'mybutton','class'=>'btn']) !!}
{!! Form::close() !!}


<script >

    function validatefunc() {
        var title = document.forms['validateform']['title'].value;
        var alias = document.forms['validateform']['alias'].value;
        var price = document.forms['validateform']['price'].value;

        if (title.length == 0 || alias.length ==0 || price.length ==0) {
            return false;

}
}




</script>

