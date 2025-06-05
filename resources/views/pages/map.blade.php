@extends('layout.guest')
@section('seo_title', 'Karte')
@section('seo_description', '')

@section('header')
<x-headings.h1>
  Übersichtskarte
</x-headings.h1>
@endsection

@section('content')
  <x-layout.container>
    <div id="map" class="w-full h-[600px]"></div>
  </x-layout.container>


  {{-- <script>const _projects = @json($data);</script> --}}
  <script>
    const _projects = [
      {
        title: "Zürich West Development",
        slug: "zurich-west",
        lat: 47.3857,
        lng: 8.5123
      },
      {
        title: "Seefeld Renovation",
        slug: "seefeld-renovation",
        lat: 47.3559,
        lng: 8.5611
      },
      {
        title: "GreenTech Campus",
        slug: "greentech-campus",
        lat: 47.4022,
        lng: 8.5487
      },
      {
        title: "Altstetten Park Upgrade",
        slug: "altstetten-park",
        lat: 47.3881,
        lng: 8.4763
      },
      {
        title: "Kreis 4 Cultural Hub",
        slug: "kreis4-hub",
        lat: 47.3765,
        lng: 8.5278
      }
    ];
  </script>
  @vite('resources/js/map.js')
@endsection
