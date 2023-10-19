@extends('layouts.app')
@section('content')
<div class="container text-center">
    <h1 class="jqy9uexh jqy9ueyv jqy9ueza 0 0 jqy9uehs jqy9uewd jqy9ue1ea jqy9ue1nv jqy9ue1gn jqy9ue1kj jqy9ue1pt jqy9ue208 jqy9ue1ta jqy9ue1wr jqy9uezh jqy9ue7"><span class="v4q0990">Адрес эл.почты и пароль ?</span></h1>
    <form method="post" action="{{ route('login') }}" class="oneAction">
        @csrf
        <div class="input-group mb-3 w-50 mx-auto">
            <input type="email" class="form-control" name="email" placeholder="Эл.Почта" autocorrect="off" value="{{ old('email') }}">
            
        </div>
        <div class="input-group mb-3 w-50 mx-auto">
            
            <input type="password" class="form-control" name="password" placeholder="password" autocorrect="off">
          
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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
