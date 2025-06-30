<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Nach 100 Jahren und diversen Umbauten hatte die denkmalgeschützte städtische Siedlung «Im Birkenhof» viel von ihrer ursprünglichen Qualität eingebüsst. Die Sanierung stellte diese wieder her, sei es durch Reparatur, Ergänzung oder Neuinterpretation alter Elemente. Die Wohnungen erfüllen nun heutige Bedürfnisse; der grosszügige gemeinschaftliche Freiraum wurde in seinem Charakter gestärkt und zu einem Ort mit hoher Biodiversität gestaltet. Dabei gelang es nicht nur, günstigen Wohnraum zu erhalten und zu revitalisieren; dank einer Etappierung konnten die Mieter*innen nach der Instandstellung in ihre Wohnungen zurückkehren.</p>
  </x-layout.article>
</x-buildings.container>

<x-accordion.wrapper>

  <x-accordion.item index="1" title="Credits">
    <x-layout.article class="building-description">
      <p>
        <a 
          href="{{ route('page.map') }}#{{ $building->slug }}">
          Übersichtskarte
        </a>
      </p>
      <p>
        Adresse<br>
        <a 
          href="{{ $building->maps }}" 
          target="_blank"
          rel="noopener noreferrer">
          Schaffhauserstrasse 111
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Stadt Zürich 
      </p>
      <p>
        Architektur<br>Romero Schaefle Partner Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>Westpol Landschaftsarchitektur GmbH
      </p>
      <p>
        Fotografie<br>Seraina Wirz, Karin Gauch und Fabien Schwartz
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>