<a 
  href="{{ route('page.building', $building->slug) }}"
  aria-label="{{ $building->title }}"
  class="relative block group">
  <figure>
    <picture>
      <source srcset="/media/{{ $building->slug }}/{{ $building->slug }}-start.avif" type="image/avif">
      <img 
        src="/media/{{ $building->slug }}/{{ $building->slug }}-start.jpg" 
        width="720" 
        height="960" 
        alt="{{ $building->title }}" 
        loading="lazy" 
        {{ $attributes->merge(['class' => 'w-full h-auto']) }}>
    </picture>
    @if ($building->slug == 'guggach-siedlung-hofwiesenstrasse')
      @include('components.buildings.teaser.shapes.' . $building->slug, ['class' => 'hidden md:block absolute inset-0 w-full h-full z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-200'])
    @endif
    <figcaption class="text-lumora lg:p-20 hyphens-auto text-xl md:text-2xl md:text-black text-center absolute inset-0 z-20 flex items-center justify-center text-balance md:opacity-0 group-hover:opacity-100 transition-opacity duration-200">
      {{ $building->title }}
    </figcaption>
  </figure>
</a>