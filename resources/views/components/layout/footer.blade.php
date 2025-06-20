@if (request()->routeIs('page.home'))
<footer class="bg-black">
  <x-layout.container class="py-30 md:py-15 xl:py-20 text-white text-xs md:flex md:justify-between">
    <div class="mb-10 md:mb-0">
      &copy; 2025 Stadt Zürich
    </div>
    <nav>
      <ul class="flex flex-col md:flex-row gap-y-10 md:gap-y-0 md:gap-x-25">
        <li>
          <a 
            href="https://www.stadt-zuerich.ch/de/politik-und-verwaltung/kommunikation-und-transparenz/social-media.html"
            target="_blank"
            title="Social Media"
            rel="noopener noreferrer"
            class="hover:underline underline-offset-4 decoration-1">
            Social Media
          </a>
        </li>
        <li>
          <a 
            href="https://www.stadt-zuerich.ch/de/service/rechtliche-hinweise.html"
            target="_blank"
            title="Rechtliche Hinweise"
            rel="noopener noreferrer"
            class="hover:underline underline-offset-4 decoration-1">
            Rechtliche Hinweise
          </a>
        </li>
        <li>
          <a 
            href="https://www.stadt-zuerich.ch/de/service/impressum.html"
            target="_blank"
            title="Impressum"
            rel="noopener noreferrer"
            class="hover:underline underline-offset-4 decoration-1">
            Impressum
          </a>
        </li>
        <li>
          <a 
            href="https://www.stadt-zuerich.ch/de/service/barrierefreiheit.html"
            target="_blank"
            title="Barrierefreiheit"
            rel="noopener noreferrer"
            class="hover:underline underline-offset-4 decoration-1">
            Barrierefreiheit
          </a>
        </li>
      </ul>
    </nav>
  </x-layout.container>
</footer>
@endif
@vite('resources/js/app.js')
@if (request()->routeIs('page.building'))
@vite('resources/js/interaction.js')
@endif
@auth
@vite('resources/js/spa.js')
@endauth
</body>
</html>
<!-- made with ❤ by everyedition.ch & nostudio.ch & marceli.to -->