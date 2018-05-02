@extends('layouts.app')

@section('title') | Home page @endsection

@section('content')
    @include('shared.navbar')
    @include('home.components.header')
    <div class="spacer"></div>
@endsection