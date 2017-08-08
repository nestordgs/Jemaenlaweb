{{--
    Created by Nestor on 7/30/2017.
    Template Name: Services
--}}
@extends('layouts.app')
@section('content')
    @include('partials.services.title-services')
    <div class="container">
        @include('partials.services.grid')
    </div>
@endsection
