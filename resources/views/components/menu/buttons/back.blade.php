@php
  $referer = request()->headers->get('referer');
  $baseUrl = rtrim(url('/'), '/');
  $refererNormalized = $referer ? rtrim($referer, '/') : null;
@endphp

@if ($refererNormalized === $baseUrl)
  <a 
    href="javascript:history.back()"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@elseif (request()->routeIs('page.info') || request()->routeIs('page.map'))
  <a 
    href="{{ route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@elseif ($referer == url()->current())
  <a 
    href="{{ route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@else  
  <a 
    href="{{ $referer ?? route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@endif
