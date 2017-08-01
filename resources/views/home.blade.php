{{--
    Created by Nestor on 6/7/2017.
    Template Name: Home
--}}
@extends('layouts.home')
@section('content')
    @include('partials.home.header-home')
    @include('partials.home.about-me')
    @include('partials.home.subscription')
    @include('partials.home.testimony')
@endsection