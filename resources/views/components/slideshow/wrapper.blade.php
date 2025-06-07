<div 
  class="relative w-full aspect-[16/12] md:aspect-[16/8] overflow-hidden"
  data-slider>
  <button id="prevBtn" class="absolute top-1/2 -translate-y-1/2 left-2 z-10 text-2xl bg-white/10 text-white border-none px-4 py-2 cursor-pointer backdrop-blur">
    &#8678;
  </button>

  <div class="w-full h-full">
    <div id="track" class="flex h-full will-change-transform">
      {{ $slot }}
    </div>
  </div>

  <button id="nextBtn" class="absolute top-1/2 -translate-y-1/2 right-2 z-10 text-2xl bg-white/10 text-white border-none px-4 py-2 cursor-pointer backdrop-blur">
    &#8680;
  </button>
</div>
