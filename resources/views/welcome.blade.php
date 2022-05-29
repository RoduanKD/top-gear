@extends('layouts.app')

@section('title', 'TopGear | Home')

@section('content')
    @include('sections.home')
    @include('sections.about')
    @include('sections.our_cars')

    @include('sections.why_choose_us')

    @include('sections.testimonial')

    @include('sections.contact')


@endsection
