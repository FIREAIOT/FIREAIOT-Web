@extends('layouts.app')

@section('title') | Dashboard @endsection

@section('content')
    @include("shared.navbar")
    <alarms-viewer></alarms-viewer>
@endsection