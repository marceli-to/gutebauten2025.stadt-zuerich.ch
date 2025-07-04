@props([
  'slug' => '',
  'number' => '',
  'alt' => '',
  'width' => '',
  'height' => '',
  'lazy' => true,
])
<picture class="h-full shrink-0">
  <source media="(min-width: 1280px)" srcset="/media/{{ $slug }}/{{ $slug }}-{{ $number }}-xl.avif" type="image/avif">
  <source media="(min-width: 1024px)" srcset="/media/{{ $slug }}/{{ $slug }}-{{ $number }}-lg.avif" type="image/avif">
  <source srcset="/media/{{ $slug }}/{{ $slug }}-{{ $number }}.avif" type="image/avif">
  <source media="(min-width: 1280px)" srcset="/media/{{ $slug }}/{{ $slug }}-{{ $number }}-xl.jpg" type="image/jpeg">
  <source media="(min-width: 1024px)" srcset="/media/{{ $slug }}/{{ $slug }}-{{ $number }}-lg.jpg" type="image/jpeg">
  <img 
    src="/media/{{ $slug }}/{{ $slug }}-{{ $number }}.jpg" 
    width="{{ $width ?? '900' }}" 
    height="{{ $height ?? '600' }}" 
    alt="{{ $alt }}" 
    loading="eager"
    fetchpriority="high"
    {{ $attributes->merge(['class' => 'h-full w-auto object-cover shrink-0']) }}>
</picture>