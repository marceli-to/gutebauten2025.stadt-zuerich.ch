<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Auf dem Areal der ehemaligen SBB-Werkstätten in Altstetten soll sich eine nachhaltige Mischung aus urbaner Produktion, Gewerbe, Dienstleistungs- und Freizeitangebot etablieren – so das Ziel des Projekts Werkstadt Zürich. Das Gebäude Q bildet die erste Etappe dieser Transformation. Die Halle wurde denkmalpflegerisch saniert und mit Respekt für die historischen Qualitäten mit einfachen, rückbaubaren Einbauten versehen. Parallel zu den Planungen wurden in temporär verfügbaren Räumen Pioniernutzungen angeregt, die sich langfristig auf dem Areal etablieren und mitwachsen können. Dienstleistungsangebote im Erdgeschoss aktivieren auch die Aussenräume.</ 
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
          Hohlstrasse 400
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        SBB Immobilien AG
      </p>
      <p>
        Architektur<br>
        baubüro in situ ag
      </p>
      <p>
        Nutzungstransformation<br>
        denkstatt sàrl
      </p>
      <p>
        Fotografie<br>
        Martin Zeller Studiozeller
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>
</x-accordion.wrapper>