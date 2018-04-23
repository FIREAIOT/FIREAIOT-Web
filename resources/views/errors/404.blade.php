@extends('layouts.app')

@section('title') | Page not found @endsection

@section('content')
    @include('shared.navbar', ['theme' => 'navbar-default'])
    @include('errors.components.header404')
@endsection