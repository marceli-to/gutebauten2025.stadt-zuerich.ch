<header class="bg-lumora min-h-96 md:min-h-60 xl:min-h-72 pb-5 md:pb-0 flex items-end md:items-center border-b-3 xl:border-b-4 border-black">
  <x-layout.container class="flex justify-between items-center">
    {{ $slot }}
    <x-menu.buttons.back />
  </x-layout.container>
</header>
