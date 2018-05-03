@extends('layouts.app')

@section('title') | Not Authorized @endsection

@section('content')
    @include('shared.navbar', ['theme' => 'navbar-default'])
    @include('errors.components.header401')
@endsection