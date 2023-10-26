@extends('layouts.app')
@section('content')
<h1 class="h3">Выберите пол</h1>
<div class="container text-center">
    <form method="post" action="{{ route('register.gender') }}" class="oneAction">
        @csrf
        <div class="mb-3 w-50 mx-auto">
            <input type='radio'id='male' checked='checked' name='radio' value="Мужской">
            <label for='male' style="width: 100%">Мужской</label>
            <input type='radio' id='female' name='radio' value="Женский">
            <label for='female' style="width: 100%">Женский</label>
        </div>
      
        
        <button type="submit" class="custom-button btn btn-primary btn-sm rounded-pill">Отправить</button>
    </form>
</div>
<style>
  @import url(https://fonts.googleapis.com/css?family=Lato);
h1{
    text-align: center;
}
h3{
   
  font-size: 1.2rem;
}
.container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}
label{
  user-select: none;
}
input[type="radio"] {
  display: none;
}

input[type="radio"] + label {
  z-index: 10;
  margin: 0 10px 10px 0;
  position: relative;
  color: #ced4da;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
  font-weight: bold;
  background-color: #ffffff;
  border: 2px solid #ced4da;
  cursor: pointer;
  transition: all 200ms ease;
}

input[type="radio"]:checked + label {
  color: #495057;
  background-color: #ced4da;
}

input[type="radio"] + label {
  padding: 5px 20px;
  border-radius: 10px;
}

</style>

@endsection