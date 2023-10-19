@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #3498db; color: #fff;">{{ __('Панель управления') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Вы успешно зарегистрированы!') }}
                   
                </div>
             
            </div>
         
        </div>
       
    </div>
    <br>
   
    <div class="text-center"> <!-- Добавляем класс для выравнивания по центру -->
        <a href="{{ route('login') }}" class="custom-link">Перейти на авторизацию</a>
    </div>
    
</div>


@endsection
<style>
    .custom-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.custom-link:hover {
    background-color: #007bff; /* Измените цвет при наведении курсора */
}
</style>