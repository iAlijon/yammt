@extends('layouts.app')

@section('content')
    <main>
    @include('head')
    <!-- system -->
    @include('system')
    <!-- employer -->
    @include('slide_employer')
    <!-- worker -->
    @include('slide_worker')
    <!-- statistics -->
    @include('statistics')
    <!-- person -->
    @include('person')
    <!-- base -->
    @include('base')
    </main>
@endsection
