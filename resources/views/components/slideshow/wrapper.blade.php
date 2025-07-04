<div 
  class="relative w-full aspect-[4/3] xl:aspect-auto overflow-hidden bg-white"
  data-slider>

  <button 
    id="prevBtn" 
    class="absolute top-0 left-0 w-1/2 h-full z-10 p-20 xl:p-30 flex flex-col items-start justify-center group"
    aria-label="Vorheriges Bild"
    data-slider-button>
    <x-icons.chevron.left class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-100" />
  </button>

  <div class="w-full h-full">
    <div data-slider-track class="flex h-full will-change-transform">
      {{ $slot }}
    </div>
  </div>

  <button 
    id="nextBtn"
    aria-label="Nächstes Bild"
    class="absolute top-0 right-0 w-1/2 h-full z-10 p-20 xl:p-30 flex flex-col items-end justify-center group"
    data-slider-button>
    <x-icons.chevron.right class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-100" />
  </button>

  <button 
    id="scrollBtn" 
    aria-label="Scrollen"
    class="absolute bottom-20 2xl:bottom-30 right-20 z-10 group hidden lg:block">
    <x-icons.chevron.down class="text-white group-hover:text-black transition-all" />
  </button>
</div>
