@extends('layout.guest')
@section('seo_description', '')
@section('content')
  <x-layout.inner class="p-20">
    <p><a href="{{ route('page.info') }}">Info zum Voting</a></p>
    <p><a href="{{ route('page.map') }}">Übersichtskarte</a></p>
  </x-layout.inner>
@endsection
