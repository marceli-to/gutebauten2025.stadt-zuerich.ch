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
  <x-layout.inner>
    <button 
      type="button"
      id="{{ $buttonId }}"
      class="w-full block"
      @click="toggle()"
      :aria-expanded="open.toString()"
      aria-controls="{{ $panelId }}">
      <div class="w-full flex items-center justify-between py-10 md:py-15 xl:py-20">
        <x-headings.h2 class="!leading-none">
          {{ $title }}
        </x-headings.h2>

        <span :class="{ 'block': !open, 'hidden': open }">
          <x-icons.chevron-down class="w-32 md:w-42 xl:w-56 h-auto shrink-0" />
        </span>
        <span :class="{ 'block': open, 'hidden': !open }">
          <x-icons.chevron-up class="w-32 md:w-42 xl:w-56 h-auto shrink-0" />
        </span>
      </div>
    </button>

    <div 
      id="{{ $panelId }}"
      x-ref="container"
      role="region"
      aria-labelledby="{{ $buttonId }}"
      class="relative overflow-hidden transition-all duration-300 ease-in-out max-h-0"
      style="max-height: 0px;">
      <div 
        class="w-full pb-25 transition-opacity duration-300 ease-in-out"
        :class="{ 'opacity-100': open, 'opacity-0': !open }">
        {{ $slot }}
      </div>
    </div>
  </x-layout.inner>
</div>
