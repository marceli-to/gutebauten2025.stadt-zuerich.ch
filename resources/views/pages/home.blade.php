@extends('layout.guest')
@section('seo_description', 'Auszeichnung für gute Bauten der Stadt Zürich 2021–2024')
@section('content')
<div class="w-full flex flex-col pt-30 md:pt-20 lg:pt-25 xl:pt-30">
    
  <x-animation class="order-1 md:order-2" />

  <x-layout.container class="relative order-2 md:order-1">
    <div class="md:absolute md:top-10 md:right-20 xl:right-30 z-10">
      <h1 class="text-black text-right md:text-left text-2xl md:text-xl md:leading-[1.28] lg:text-3xl xl:text-4xl">
        Auszeichnung<br>für gute Bauten<br>der Stadt Zürich<br>2021–2024
      </h1>
    </div>
  </x-layout.container>


  <div class="bg-white h-60 lg:h-100 max-w-[90%] md:max-w-[340px] lg:max-w-[520px] xl:max-w-[695px] flex items-start justify-center pt-10 lg:pt-20 mt-20 lg:mt-40 order-3">
    <x-icons.logo class="w-120 lg:w-[228px] xl:w-[245px]" />
  </div>
</div>

<div class="border-t-3 xl:border-t-4 border-black">

  <x-layout.container class="border-b-3 border-black md:border-b-0 h-70 md:h-60 xl:h-70 flex items-end md:items-center">
    <x-menu.buttons.open />
    <x-menu.wrapper />
  </x-layout.container>

  <x-layout.container class="py-30">
    @foreach($buildings as $building)
      <a href="{{ route('page.building', $building->slug) }}" class="block text-xl xl:text-2xl mb-10">
        {{ $building->title }}
      </a>
    @endforeach
  </x-layout.container>

</div>
@endsection

