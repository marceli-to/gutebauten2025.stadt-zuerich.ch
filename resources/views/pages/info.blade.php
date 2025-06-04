@extends('layout.guest')
@section('seo_title', 'Info')
@section('seo_description', '')

@section('header')
<x-headings.h1>
  Info zum Voting
</x-headings.h1>
@endsection

@section('content')
<div class="bg-white border-b-3 xl:border-b-4 border-black">
  <x-layout.inner class="py-30 lg:py-40 xl:py-70 flex flex-col gap-y-45 lg:gap-y-40">

    <article class="flex items-start gap-x-20 xl:gap-x-30 max-w-[768px] xl:max-w-[1080px]">
      <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
        <x-icons.vote.info class="text-white w-75 md:w-57 lg:w-69 xl:w-92 h-auto" />
      </div>
      <div>
        <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
          Abstimmen
        </x-headings.h2>
        <p>Zur Stimmabgabe aufs Herz klicken. Mit einem weiteren Klick kann die Stimme wieder entfernt werden. Pro Projekt kann eine Stimme abgegeben werden.</p>
      </div>
    </article>

    <article class="flex items-start gap-x-20 xl:gap-x-30 max-w-[768px] xl:max-w-[1080px]">
      <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
        <x-icons.comment.info class="text-white w-74 md:w-51 lg:w-58 xl:w-76 h-auto" />
      </div>      
      <div>
        <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
          Kommentieren
        </x-headings.h2>
        <p>Mit Klick auf die Sprechblase kann ein Kommentar verfasst werden. Der Kommentar wird geprüft und innerhalb 24 Stunden veröffentlicht.</p>
      </div>
    </article>

    <article class="flex items-start gap-x-20 xl:gap-x-30 max-w-[768px] xl:max-w-[1080px]">
      <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
        <x-icons.share.info class="text-white w-73 md:w-50 lg:w-57 xl:w-74 h-auto" />
      </div>
      <div>
        <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
          Teilen
        </x-headings.h2>
        <p>Mit Klick auf das Teilen-Symbol können Projekte über Social Media geteilt werden.</p>
      </div>
    </article>
  </x-layout.inner>
</div>

<x-accordion.wrapper>
  <x-accordion.item index="1" title="Über die Auszeichnung">
    <p>Zur Stimmabgabe aufs Herz klicken. Mit einem weiteren Klick kann die Stimme wieder entfernt werden. Pro Projekt kann eine Stimme abgegeben werden.</p>
  </x-accordion.item>
  <x-accordion.item index="2" title="Publikumspreis">
    <p>Mit Klick auf die Sprechblase kann ein Kommentar verfasst werden. Der Kommentar wird geprüft und innerhalb 24 Stunden veröffentlicht.</p>
  </x-accordion.item>
  <x-accordion.item index="3" title="Beurteilungskriterien">
    <p>Mit Klick auf das Teilen-Symbol können Projekte über Social Media geteilt werden.</p>
  </x-accordion.item>
</x-accordion.wrapper>

@endsection