@extends('layout.guest')
@section('seo_title', $building->title)
@section('seo_description', '')

@section('header')
<x-headings.h1>
  {{ $building->title }}
</x-headings.h1>
@endsection

@section('content')
  <x-layout.container>
  </x-layout.container>
@endsection