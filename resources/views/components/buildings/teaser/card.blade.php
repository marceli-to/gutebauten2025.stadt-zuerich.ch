<a 
  href="{{ route('page.building', $building->slug) }}"
  aria-label="{{ $building->title }}"
  class="relative block">
  <figure class="group" data-touch>
    <picture>
      <source srcset="/media/{{ $building->slug }}/{{ $building->slug }}-card.avif" type="image/avif">
      <img 
        src="/media/{{ $building->slug }}/{{ $building->slug }}-card.png" 
        width="720" 
        height="960" 
        alt="{{ $building->title }}" 
        loading="lazy" 
        {{ $attributes->merge(['class' => 'w-full h-auto group-hover:md:opacity-0']) }}>
    </picture>
    @include('components.buildings.teaser.shapes.' . $building->slug, ['class' => 'absolute inset-0 w-full h-full z-10 opacity-0 group-hover:opacity-100 group-[.has-touch]:opacity-100'])
    <figcaption class="text-lumora px-10 md:px-15 hyphens-auto text-xl xl:text-2xl md:text-black text-center absolute inset-0 z-20 flex items-center justify-center text-balance md:opacity-0 group-hover:opacity-100 group-[.has-touch]:opacity-100">
      {{ $building->title }}<br><br>{{ $building->award }}
    </figcaption>
  </figure>
</a>