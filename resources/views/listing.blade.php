
@extends('layout')

@section('content')
@include('partials._hero')



@if (count ($listings) == 0 )
no listing
@endif
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@foreach ($listings as $listing)
    <!-- Item 1 -->
 <x-listings-card :listing="$listing"/>

    @endforeach
    </div>
@endsection