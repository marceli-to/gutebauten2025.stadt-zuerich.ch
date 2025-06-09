<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="571" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="571" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="467" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Das Quartier «Greencity» liegt an den Auen der Sihl, ist aber zweiseitig von Bahnlinie und Autobahn begrenzt und besteht mehrheitlich aus massigen Neubauten. Als einziges öffentliches Gebäude auf dem Areal hebt sich das neue Schulhaus durch seine feine Gliederung, seine Materialisierung, seine flexible Holzstruktur und seinen heiteren Ausdruck von der Umgebung ab. Es wirkt als identitätsstiftendes Zentrum, nicht zuletzt auch deshalb, weil das Dach ausserhalb der Schulzeiten über Spindeltreppen zugänglich ist: So können die von einer Photovoltaik-Pergola verschatteten Sportplätze als öffentliche Piazza in luftiger Höhe genutzt werden.</p>
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
          href="https://www.google.com/maps/place/Maneggstrasse+51" 
          target="_blank"
          rel="noopener noreferrer">
          Maneggstrasse 51
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Stadt Zürich
      </p>
      <p>
        Architektur<br>Studio Burkhardt - Studio für Architektur ETH SIA
      </p>
      <p>
        Landschaftsarchitektur<br>Ganz Landschaftsarchitekten
      </p>
      <p>
        Fotografie<br>Federico Farinatti, Matthias Vollmer, Juliet Haller
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>