<div 
  class="relative w-full aspect-[16/12] md:aspect-[16/8] 2xl:aspect-[16/7] overflow-hidden"
  data-slider>
  <button id="prevBtn" class="absolute top-1/2 -translate-y-1/2 left-0 z-10 p-20 xl:p-30">
    <x-icons.chevron.left />
  </button>

  <div class="w-full h-full">
    <div data-slider-track class="flex h-full will-change-transform">
      {{ $slot }}
    </div>
  </div>

  <button id="nextBtn" class="absolute top-1/2 -translate-y-1/2 right-0 z-10 p-20 xl:p-30">
    <x-icons.chevron.right />
  </button>
</div>
