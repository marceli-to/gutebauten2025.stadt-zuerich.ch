@extends('layout.guest')
@section('seo_title', $building->title)
@section('seo_description', $building->short_description)
@section('seo_image', '/media/' . $building->slug . '/' . $building->slug . '-opengraph.jpg')

@section('header')
<x-headings.h1>
  {{ $building->title }}
  <x-buildings.browse :browse="$browse" />
</x-headings.h1>
@endsection

@section('content')
  @include('components.buildings.' . $building->slug, ['building' => $building])
@endsection