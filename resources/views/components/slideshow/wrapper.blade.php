<div 
  class="relative w-full aspect-[4/3] _md:aspect-[16/8] _2xl:aspect-[16/7] lg:h-[calc(90vh_-_60px)] 2xl:aspect-auto 2xl:h-[calc(90vh_-_72px)] overflow-hidden bg-white"
  data-slider>
  <button id="prevBtn" class="absolute top-1/2 -translate-y-1/2 left-0 z-10 p-20 xl:p-30 group">
    <x-icons.chevron.left class="group-hover:text-lumora transition-all" />
  </button>

  <div class="w-full h-full">
    <div data-slider-track class="flex h-full will-change-transform">
      {{ $slot }}
    </div>
  </div>

  <button id="nextBtn" class="absolute top-1/2 -translate-y-1/2 right-0 z-10 p-20 xl:p-30 group">
    <x-icons.chevron.right class="group-hover:text-lumora transition-all" />
  </button>
</div>
