<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border border-black bg-black hover:bg-lumora hover:text-black text-md text-white w-full flex items-center justify-start py-8 px-12 !ring-0 !outline-none transition-all']) }}>
  {{ $slot }}
</button>
