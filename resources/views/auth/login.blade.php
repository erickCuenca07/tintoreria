@extends('layouts.plantilla')
@section('title','Login')
@section('content')
<br><br>
<div class="container">
  <h2 class="text-center">Inicio de sesion </h2>
    <form action='{{route('login.store')}}' method='post'>
        @csrf
         <!-- Email input -->
         <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="name" required/>
            <label class="form-label" for="form2Example1">Ususario</label>
          </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" name="password" required/>
                <label class="form-label" for="form2Example2">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
    </form>
    <div class="text-center">
        <p>No estas registrado? <a href="{{route('register.index')}}">Register</a></p>
      </div>
</div>
@endsection