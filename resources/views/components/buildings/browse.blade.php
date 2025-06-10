<div class="w-full md:w-auto flex justify-between items-center md:gap-x-25 {{ $class ?? ''}}">
  <a 
    href="{{ $prev['url'] }}"
    title="{{ $prev['title'] }}">
    <x-icons.chevron.left class="md:h-25 xl:h-34 w-auto" />
  </a>
  <a 
    href="{{ $next['url'] }}"
    title="{{ $next['title'] }}">
    <x-icons.chevron.right class="md:h-25 xl:h-34 w-auto" />
  </a>
</div>