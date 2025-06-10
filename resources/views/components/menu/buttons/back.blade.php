@php
  $referer = request()->headers->get('referer');
  $baseUrl = rtrim(url('/'), '/');
@endphp
@if (request()->routeIs('page.building') && str_contains($referer, 'uebersichtskarte'))
  <a 
    href="{{ route('page.map') }}"
    title="Zurück zur Karte">
    <x-icons.cross class="w-25 xl:w-34 h-auto" />
  </a>
@elseif (request()->routeIs('page.building') && rtrim($referer, '/') == $baseUrl)
  <a 
    href="javascript:history.back()"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-25 xl:w-34 h-auto" />
  </a>
@elseif (request()->routeIs('page.info') || request()->routeIs('page.map'))
  <a 
    href="{{ route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-25 xl:w-34 h-auto" />
  </a>
@else
  <a 
    href="{{ route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-25 xl:w-34 h-auto" />
  </a>
@endif
