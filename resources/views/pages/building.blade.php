@extends('layout.guest')
@section('seo_title', $building->title)
@section('seo_description', $building->short_description)
@section('seo_image', '/media/' . $building->slug . '/' . $building->slug . '-opengraph.jpg')

@section('header')
<x-headings.h1>
  {{ $building->title }} – {{ $building->award }}
</x-headings.h1>
<div class="flex md:gap-x-25">
  <div class="hidden md:block">
    <x-buildings.browse :building="$building" />
  </div>
  <x-menu.buttons.back />
</div>
@endsection

@section('content')
  @include('components.buildings.' . $building->slug, ['building' => $building])
  <x-layout.container class="py-50 md:hidden">
    <div class="md:hidden w-full">
      <x-buildings.browse :building="$building" />
    </div>
  </x-layout.container>
@endsection