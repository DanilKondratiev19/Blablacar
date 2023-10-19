@extends('layouts.app')
@section('content')
<div class="container text-center">
    <h1 class="h3">Введите эл. почту</h1>
    <form method="post" action="{{ route('register.email') }}" class="oneAction">
        @csrf
        <div class="input-group mb-3 w-50 mx-auto">
            <input type="email" class="form-control" name="email" placeholder="Почта..." autocorrect="off" value="{{ old('email') }}">
        </div>
       
        <button type="submit" class="custom-button btn btn-primary btn-sm rounded-pill">Отправить</button>
    </form>
</div>
<style> 
 .custom-button {
        background-color: hsl(197.14deg 100% 48.04%);
        color: white; /* Цвет текста белый */
        padding: 10px 20px; /* Размер отступов вокруг текста */
        border: none; /* Убираем границу */
        border-radius: 50px; /* Делаем кнопку круглой */
        cursor: pointer;
    }
</style>
@endsection
