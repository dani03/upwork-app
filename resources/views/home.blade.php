@extends('layouts.app')

@section('content')
<h1> bienvenue {{auth()->user()->name}}</h1>
    
@endsection