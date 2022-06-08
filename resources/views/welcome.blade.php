@extends('layouts.plantilla')
@section('title',' Home')
    
@section('content')
@if (auth()->check())
<h3>Hola,{{auth()->user()->name}}.</h3>
@endif
@endsection