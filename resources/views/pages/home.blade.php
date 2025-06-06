@extends('layout.guest')
@section('seo_description', '')
@section('content')
  <x-layout.container class="p-20">
    <p><a href="{{ route('page.info') }}">Info zum Voting</a></p>
    <p><a href="{{ route('page.map') }}">Übersichtskarte</a></p>
  </x-layout.container>
  {{-- <div class="w-full bg-red-200">
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.3.0/dist/dotlottie-wc.js" type="module"></script>
    <dotlottie-wc src="https://lottie.host/7bd63275-7645-428a-9307-504506df319e/YV2l85vwYp.lottie" autoplay loop></dotlottie-wc>
  </div> --}}
@endsection
