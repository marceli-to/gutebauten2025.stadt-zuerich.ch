@extends('layout.guest')
@section('seo_description', 'Gutes Bauen hat in Zürich Tradition. Die Stadt zeichnet seit rund 80 Jahren regelmässig die besten Bauwerke und Freiräume aus')
@section('seo_image', '/media/opengraph.png')
@section('content')
<div class="w-full flex flex-col md:pt-20 lg:pt-25 xl:pt-30">
    
  <x-animation class="p-20 md:p-0 order-1 md:order-2" />

  <x-layout.container class="relative order-2 md:order-1">
    <div class="md:absolute md:top-10 md:right-20 xl:right-30 z-10">
      <h1 class="text-black text-right md:text-left text-2xl md:text-xl md:leading-[1.28] lg:text-3xl xl:text-4xl">
        Auszeichnung<br>für gute Bauten<br>der Stadt Zürich<br>2021–2024
      </h1>
    </div>
  </x-layout.container>


  <div class="bg-white max-w-[90%] md:max-w-[340px] lg:max-w-[520px] xl:max-w-[695px] flex items-center justify-start pl-20 xl:pl-30 min-h-52 md:min-h-60 xl:min-h-72 mt-20 xl:mt-0 order-3">
    <x-icons.logo class="w-120 md:w-140 xl:w-180" />
  </div>
</div>

<div class="border-t-3 xl:border-t-4 border-black">

  <x-layout.container class="bg-lumora min-h-52 pb-2 md:pb-0 md:min-h-60 xl:min-h-72 flex items-center sticky top-0 z-30">
    <x-menu.buttons.open />
    <x-menu.wrapper />
  </x-layout.container>

  <x-layout.container class="py-20 md:pt-0">

    <div class="flex flex-col gap-y-4 md:hidden">
      <x-buildings.buttons.vote />
      <x-buildings.teaser.card :building="$buildings[0]" />
      <x-buildings.teaser.card :building="$buildings[1]" />
      <x-buildings.teaser.card :building="$buildings[2]" />
      <x-buildings.teaser.card :building="$buildings[3]" />
      <x-buildings.teaser.card :building="$buildings[4]" />
      <x-buildings.teaser.card :building="$buildings[5]" />
      <x-buildings.teaser.card :building="$buildings[6]" />
      <x-buildings.teaser.card :building="$buildings[7]" />
      <x-buildings.teaser.card :building="$buildings[8]" />
      <x-buildings.teaser.card :building="$buildings[9]" />
      <x-buildings.teaser.card :building="$buildings[10]" />
      <x-buildings.teaser.card :building="$buildings[11]" />
      <x-buildings.teaser.card :building="$buildings[12]" />
      <x-buildings.teaser.card :building="$buildings[13]" />
      <x-buildings.teaser.card :building="$buildings[14]" />
      <x-buildings.teaser.card :building="$buildings[15]" />
    </div>

    <div class="hidden md:grid md:grid-cols-12 md:gap-x-4 xl:hidden">
      <div class="md:col-span-4 flex flex-col gap-y-4">
        <x-buildings.teaser.card :building="$buildings[0]" />
        <x-buildings.teaser.card :building="$buildings[1]" />
        <x-buildings.teaser.card :building="$buildings[2]" />
        <x-buildings.teaser.card :building="$buildings[3]" />
        <x-buildings.teaser.card :building="$buildings[4]" />
        <x-buildings.teaser.card :building="$buildings[5]" />
      </div>
    
      <div class="md:col-span-4 flex flex-col gap-y-4">
        <x-buildings.buttons.vote />
        <x-buildings.teaser.card :building="$buildings[6]" />
        <x-buildings.buttons.info />
        <x-buildings.teaser.card :building="$buildings[7]" />
        <x-buildings.teaser.card :building="$buildings[8]" />
        <x-buildings.teaser.card :building="$buildings[9]" />
      </div>
    
      <div class="md:col-span-4 flex flex-col gap-y-4">
        <x-buildings.teaser.card :building="$buildings[10]" />
        <x-buildings.buttons.map />
        <x-buildings.teaser.card :building="$buildings[11]" />
        <x-buildings.teaser.card :building="$buildings[12]" />
        <x-buildings.teaser.card :building="$buildings[13]" />
        <x-buildings.teaser.card :building="$buildings[14]" />
        <x-buildings.teaser.card :building="$buildings[15]" />
      </div>
    </div>
    
    <div class="hidden xl:grid xl:grid-cols-12 xl:gap-x-4">
      <div class="xl:col-span-3 xl:flex xl:flex-col xl:gap-y-4">
        <x-buildings.teaser.card :building="$buildings[0]" />
        <x-buildings.teaser.card :building="$buildings[1]" />
        <x-buildings.teaser.card :building="$buildings[2]" />
        <x-buildings.teaser.card :building="$buildings[3]" />
        <x-buildings.teaser.card :building="$buildings[4]" />
      </div>
      <div class="xl:col-span-3 xl:flex xl:flex-col xl:gap-y-4">
        <x-buildings.buttons.vote />
        <x-buildings.teaser.card :building="$buildings[5]" />
        <x-buildings.buttons.info />
        <x-buildings.teaser.card :building="$buildings[6]" />
        <x-buildings.teaser.card :building="$buildings[7]" />
      </div>
      <div class="lg:col-span-3 xl:flex xl:flex-col xl:gap-y-4">
        <x-buildings.teaser.card :building="$buildings[8]" />
        <x-buildings.buttons.map />
        <x-buildings.teaser.card :building="$buildings[9]" />
        <x-buildings.teaser.card :building="$buildings[10]" />
        <x-buildings.teaser.card :building="$buildings[11]" />
      </div>
      <div class="lg:col-span-3 xl:flex xl:flex-col xl:gap-y-4">
        <x-buildings.teaser.card :building="$buildings[12]" />
        <x-buildings.teaser.card :building="$buildings[13]" />
        <x-buildings.teaser.card :building="$buildings[14]" />
        <x-buildings.teaser.card :building="$buildings[15]" />
      </div>
    </div>
  </x-layout.container>
   
</div>
@endsection
