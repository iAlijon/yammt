@extends('layouts.app')

@section('content')
    <main>
        @include('layouts.head')
        <!-- system -->
        @include('layouts.system')
        <!-- employer -->
        @include('layouts.slide_employer')
        <!-- worker -->
        @include('layouts.slide_employer')
        <!-- statistics -->
        @include('layouts.statistics')
        <!-- person -->
            @include('layouts.person')
        <!-- base -->
            @include('layouts.base')

    </main>
@endsection
