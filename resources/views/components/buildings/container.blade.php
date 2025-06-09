<div class="bg-white pt-20 pb-30 xl:py-40 border-b-3 xl:border-b-4 border-black">
  <x-layout.container class="relative">
    
    {{-- Interaction App --}}
    <div 
      id="interaction-app"
      class="mb-10 lg:mb-0 lg:absolute lg:-top-70 lg:left-20 xl:-top-100 xl:left-30">
      <interaction
        slug="{{ $building->slug }}"
        title="{{ $building->title }}"
        url="{{ route('page.building', $building->slug) }}"
        :has_vote="@json((bool) $hasVote)"
      ></interaction>
    </div>

    {{-- Content --}}
    {{ $slot }}
    
  </x-layout.container>
</div>