@extends('layouts.app')

@section('content')
<div class="form-row text-center">
    <h1 class="jqy9uexh jqy9ueyv jqy9ueza 0 0 jqy9uehs jqy9uewd jqy9ue1ea jqy9ue1nv jqy9ue1gn jqy9ue1kj jqy9ue1pt jqy9ue208 jqy9ue1ta jqy9ue1wr jqy9uezh jqy9ue7"><span class="v4q0990">Как вы хотите зарегистрироваться?</span></h1>
</div>
<div class="d-grid gap-2 col-6 mx-auto">
    
    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 10px;">
        <a class="btn btn-primary btn-transparent" href="{{ route('register.email') }}">Через электронную почту</a>
    </div>
    
    
  </div>
<style>
 .btn.btn-transparent {
    background-color: transparent;
    color: black; /* Изменили цвет текста на черный */
    transition: background-color 0.3s, color 0.3s; /* Добавили переход для фона и цвета текста */
}

.btn.btn-transparent:hover {
    background-color: lightgray;
    color: black; /* При наведении, цвет текста остается черным */
}


</style>
@endsection
