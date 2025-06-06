@extends('layout.guest')
@section('seo_title', 'Karte')
@section('seo_description', '')

@section('header')
<x-headings.h1>
  Übersichtskarte
</x-headings.h1>
@endsection

@section('content')
<div class="aspect-[16/9]">
  <div id="map" class="w-full h-full object-cover absolute inset-0"></div>
</div>
<script>const _buildings = @json($data);</script>
@vite('resources/js/map.js')
@endsection
