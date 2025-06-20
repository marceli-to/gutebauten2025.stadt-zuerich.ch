<nav 
  x-cloak
  x-show="menu === true"
  class="bg-lumora fixed top-0 left-0 z-40 w-full h-dvh lg:h-screen"
  aria-label="Menü">
  <x-menu.buttons.close />
  <x-layout.container class="flex flex-col lg:flex-row lg:gap-x-5 h-dvh lg:h-screen items-center justify-center w-full">
    <x-menu.buttons.info />
    <x-menu.buttons.map />
  </x-layout.container>
</nav>