<div 
  class="relative w-full aspect-[4/3] lg:h-[calc(100vh_-_60px)] xl:h-[calc(100vh_-_72px)] xl:aspect-auto overflow-hidden bg-white"
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

  <button id="scrollBtn" class="absolute bottom-20 2xl:bottom-30 right-20 z-10 group hidden lg:block">
    <x-icons.chevron.down class="text-white group-hover:text-lumora transition-all" />
  </button>
</div>
