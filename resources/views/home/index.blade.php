@extends('layouts.app')

@section('title') | Home page @endsection

@section('content')
    @include('home.components.header')
    @include('home.components.badges')
    @include('shared.footer')
@endsection