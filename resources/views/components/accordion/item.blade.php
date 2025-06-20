@props([
  'index',
  'title'
])

@php
  $buttonId = "accordion-button-{$index}";
  $panelId = "accordion-panel-{$index}";
@endphp

<div 
  x-data="{
    open: false,
    init() {
      this.open = selected === {{ $index }};
    },
    toggle() {
      selected = selected !== {{ $index }} ? {{ $index }} : null;
    },
    updateHeight() {
      this.$refs.container.style.maxHeight = this.open
        ? this.$refs.container.scrollHeight + 'px'
        : '0px';
    }
  }"
  x-effect="open = selected === {{ $index }}; updateHeight()"
  class="relative w-full border-b-3 xl:border-b-4 border-black">
  <button 
    type="button"
    id="{{ $buttonId }}"
    class="w-full block hover:bg-white transition-colors duration-300 ease-in-out"
    :class="{ 'bg-white': open, 'bg-lumora': !open }"
    @click="toggle()"
    :aria-expanded="open.toString()"
    aria-controls="{{ $panelId }}">
    <x-layout.container class="w-full flex items-center justify-between min-h-52 md:min-h-60 xl:min-h-72">
      <x-headings.h2 class="text-left pb-5 pt-2 md:py-0">
        {{ $title }}
      </x-headings.h2>

      <span :class="{ 'block': !open, 'hidden': open }">
        <x-icons.chevron.down class="w-32 md:w-42 xl:w-56 h-auto shrink-0" />
      </span>
      <span :class="{ 'block': open, 'hidden': !open }">
        <x-icons.chevron.up class="w-32 md:w-42 xl:w-56 h-auto shrink-0" />
      </span>
    </x-layout.container>
  </button>
  <div 
    id="{{ $panelId }}"
    x-ref="container"
    role="region"
    aria-labelledby="{{ $buttonId }}"
    class="relative bg-transparent overflow-hidden max-h-0 transition-all duration-300 ease-in-out" 
    :class="{ 'bg-white': open }"
    style="max-height: 0px;">
    <x-layout.container>
      <div 
        class="w-full pb-25 xl:pb-35 transition-opacity duration-300 ease-in-out"
        :class="{ 'opacity-100': open, 'opacity-0': !open }">
        {{ $slot }}
      </div>
    </x-layout.container>
  </div>
</div>
