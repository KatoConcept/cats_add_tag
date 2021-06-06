@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            @include('partials.album-card', $cat)
        </div>
    </div>
@endsection
