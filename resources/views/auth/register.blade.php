@extends('layouts.plantilla')
@section('title','Registrar')
@section('content')
<br>
<div class="container">
  <h2 class="text-center">Registro en la Plataforma</h2>
<form action='{{route('register.store')}}' method='post'>
    @csrf
    <div class="form-outline mb-4">
        <input type="text" id="form3Example3" class="form-control" name="name" required/>
        <label class="form-label" for="form3Example3">Nombre de Usuario</label>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form3Example3" class="form-control" name="email"  required/>
      <label class="form-label" for="form3Example3">Email</label>
    </div>
  
    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form3Example4" class="form-control" name="password"  required/>
      <label class="form-label" for="form3Example4">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Registrarse</button>
  </form>
    <div class="text-center">
        <p>¿Ya estas registrado? <a href="{{route('login.index')}}">Inicia sesion</a></p>
    </div>
</div>
@endsection