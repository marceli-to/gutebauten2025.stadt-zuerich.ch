<a 
  href="{{ route('page.info') }}"  
  title="Info zum Voting" 
  aria-label="Info zum Voting"
  class="relative shrink-0 flex justify-center items-center aspect-square w-full text-white hover:text-lumora transition-color duration-300 {{ $class ?? '' }}">

  <svg width="362" height="362" viewBox="0 0 362 362" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute hidden md:block xl:hidden w-full h-full z-10">
    <circle cx="180.813" cy="180.813" r="179.313" fill="currentColor" stroke="black" stroke-width="3" vector-effect="non-scaling-stroke" />
  </svg>

  <svg width="360" height="360" viewBox="0 0 360 360" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute hidden xl:block w-full h-full z-10">
    <circle cx="180" cy="180" r="178" fill="currentColor" stroke="black" stroke-width="4" vector-effect="non-scaling-stroke" />
  </svg>

  <span class="block text-black text-xl xl:text-2xl relative z-20">
    Info
  </span>
</a>
