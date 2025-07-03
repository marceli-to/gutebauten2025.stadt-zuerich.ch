@extends('layout.guest')
@section('seo_title', 'Karte')
@section('seo_description', 'Interaktive Karte zur «Auszeichnung für gute Bauten» der Stadt Zürich: Entdecken Sie alle Bauten und Freiräume aus den Jahren 2021 bis 2024 auf einen Blick.')
@section('seo_image', '/media/opengraph.png')
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
