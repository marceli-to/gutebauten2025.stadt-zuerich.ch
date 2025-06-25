<a 
  href="{{ route('page.building', $building->slug) }}"
  title="{{ $building->title }}"
  aria-label="{{ $building->title }}"
  class="relative block group"
  data-touch
  data-teaser-card>
  <figure>
    <picture>
      <source srcset="/media/{{ $building->slug }}/{{ $building->slug }}-start.avif" type="image/avif">
      <img 
        src="/media/{{ $building->slug }}/{{ $building->slug }}-start.jpg" 
        width="720" 
        height="960" 
        alt="{{ $building->title }}" 
        loading="lazy" 
        {{ $attributes->merge(['class' => 'w-full h-auto group-hover:brightness-[0.8] group-[.has-touch]:brightness-[0.8] transition-all']) }}>
    </picture>
    <figcaption class="text-lumora lg:p-20 hyphens-auto font-sans-medium md:font-sans text-2xl text-center absolute inset-0 flex items-center justify-center text-balance md:opacity-0 group-hover:opacity-100 group-[.has-touch]:opacity-100 transition-opacity duration-200">
      {{ $building->title }}
    </figcaption>
  </figure>
</a>