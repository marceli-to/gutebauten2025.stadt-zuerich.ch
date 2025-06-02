@props(['value'])
<label class="block leading-none text-md mb-8">
  {{ $value ?? $slot }}
</label>