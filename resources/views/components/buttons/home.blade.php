@if (request()->routeIs('page.info') || request()->routeIs('page.map'))
  <a 
    href="{{ route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@else
  <a 
    href="{{ request()->header('referer') ?? route('page.home') }}"
    title="Zurück zur Startseite">
    <x-icons.cross class="w-26 xl:w-34 h-auto" />
  </a>
@endif 
{{-- <div class="fixed bottom-0 right-0 p-20 text-xs bg-blue-200">
  {{ request()->header('referer') }}
</div> --}}
