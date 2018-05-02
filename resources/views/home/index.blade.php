@extends('layouts.app')

@section('title') | Home page @endsection

@section('content')
    @include('home.components.navbar')
    @include('home.components.header')
@endsection