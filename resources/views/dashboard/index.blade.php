@extends('layouts.app')

@section('title') | Dashboard @endsection

@section('content')
    @include("shared.navbar")
    @foreach($alarms as $alarm)
        {{ $alarm->latitude }}, {{ $alarm->longitude }}
    @endforeach
    <alarms-viewer></alarms-viewer>
@endsection