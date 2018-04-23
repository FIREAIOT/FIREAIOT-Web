@extends('layouts.app')

@section('title') | Home page @endsection

@section('content')
    @include('shared.navbar')
    @include('home.components.header')
    @include('home.components.badges')
    @include('home.components.services')
    @include('home.components.education')
    @include('home.components.blog')
    @include('home.components.resources')
    @include('home.components.newProject')
    @include('shared.footer')
@endsection