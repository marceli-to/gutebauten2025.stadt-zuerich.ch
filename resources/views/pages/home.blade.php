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
    <div class="hidden xl:grid xl:grid-cols-12 xl:gap-x-4 ">
      <div class="xl:col-span-3 xl:flex xl:flex-col xl:gap-y-4">
        <x-buildings.teaser slug="buero-und-gewerbehaus-binzstrasse" />
        <x-buildings.teaser slug="hochhausensemble-wolkenwerk" />
        <x-buildings.teaser slug="kongresshaus-und-tonhalle" />
        <x-buildings.teaser slug="sanierung-hochhaus-herdern" />
        <x-buildings.teaser slug="provisorische-sportbauten" />
      </div>
      <div class="xl:col-span-3 flex flex-col gap-y-4">

        <div class="relative aspect-square flex flex-col justify-center items-center group">
          <x-icons.vote.bubble class="w-full h-auto absolute inset-0 z-10" />
          <span class="relative z-20 group-hover:hidden text-2xl">Jetzt<br>abstimmen</span>
          <span class="relative z-20 hidden group-hover:block p-30 text-sm xl:text-md text-center">
            <x-icons.vote.filled class="mx-auto mb-20" />
            Zur Stimmabgabe aufs Herz klicken. Mit einem weiteren Klick kann die Stimme wieder entfernt werden.<br><br>Pro Projekt kann eine Stimme abgegeben werden.
          </span>
        </div>


        <x-buildings.teaser slug="rathaus-kirche-hard" />
        <x-buttons.info />
        <x-buildings.teaser slug="neubau-universitaets-kinderspital" />
        <x-buildings.teaser slug="wohnueberbauung-klopstock" />
      </div>
      <div class="lg:col-span-3 flex flex-col gap-y-4">
        <x-buildings.teaser slug="gesamtsanierung-hauptbahnhof-suedtrakt" />
        <x-buttons.map />
        <x-buildings.teaser slug="guggach-siedlung-hofwiesenstrasse" />
        <x-buildings.teaser slug="haus-im-garten" />
        <x-buildings.teaser slug="gesamtsanierung-gebaeude-q" />

      </div>
      <div class="lg:col-span-3 flex flex-col gap-y-4">
        <x-buildings.teaser slug="schulanlage-allmend" />
        <x-buildings.teaser slug="wohnsiedlung-im-birkenhof" />
        <x-buildings.teaser slug="kreislaufhaus-herbstweg" />
        <x-buildings.teaser slug="musikpavillon-sihlhoelzli" />
      </div>
    </div>
  </x-layout.container>
   
</div>
@endsection

{{-- 
buero-und-gewerbehaus-binzstrasse
gesamtsanierung-gebaeude-q
gesamtsanierung-hauptbahnhof-suedtrakt
guggach-siedlung-hofwiesenstrasse
haus-im-garten
hochhausensemble-wolkenwerk
kongresshaus-und-tonhalle
kreislaufhaus-herbstweg
musikpavillon-sihlhoelzli
neubau-universitaets-kinderspital
provisorische-sportbauten
rathaus-kirche-hard
sanierung-hochhaus-herdern
schulanlage-allmend
wohnsiedlung-im-birkenhof
wohnueberbauung-klopstock 
--}}
