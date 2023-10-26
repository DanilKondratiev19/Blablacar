@extends('layouts.app')
@section('content')
<div class="container text-center">
    <h1 class="h3">Введите дату рождения</h1>
    <form method="post" action="{{ route('register.birthday') }}" class="oneAction">
        @csrf
        <div class="input-group mb-3 w-50 mx-auto">
            <input type="text" class="form-control" name="date" id="dateOfBirth" placeholder="ДД/ММ/ГГГГ" required pattern="\d{2}/\d{2}/\d{4}">
        </div>
        @error('date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" class="custom-button btn btn-primary btn-sm rounded-pill">Отправить</button>
    </form>
</div>
<style>
.custom-button {
    background-color: hsl(197.14deg 100% 48.04%);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
}
</style>
<script>
document.addEventListener('input', function (e) {
    if (e.target.id === 'dateOfBirth') {
        var input = e.target;
        var value = input.value.replace(/\D/g, ''); // Удаляем все нечисловые символы
        var formattedDate = '';

        if (value.length >= 1) {
            formattedDate += value.substring(0, 2);
        }
        if (value.length >= 3) {
            formattedDate += '/' + value.substring(2, 4);
        }
        if (value.length >= 5) {
            formattedDate += '/' + value.substring(4, 8);
        }

        input.value = formattedDate;
    }
});
</script>
@endsection
