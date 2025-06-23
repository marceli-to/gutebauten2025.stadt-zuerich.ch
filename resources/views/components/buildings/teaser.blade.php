<a 
  href="{{ route('page.building', $building->slug) }}"
  title="{{ $building->title }}"
  aria-label="{{ $building->title }}"
  class="col-span-full md:col-span-4 lg:col-span-3 relative group">
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
    <figcaption class="text-lumora text-2xl text-center absolute inset-0 flex items-center justify-center text-balance md:opacity-0 group-hover:opacity-100 transition-opacity duration-200">
      {{ $building->title }}
    </figcaption>
  </figure>
</a>