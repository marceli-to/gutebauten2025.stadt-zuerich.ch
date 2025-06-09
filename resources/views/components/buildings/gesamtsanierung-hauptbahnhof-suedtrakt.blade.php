<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="934" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1049" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Der 1871 erbaute Südtrakt fungierte einst als repräsentative Fassade des Hauptbahnhofs zur Stadt, mit prachtvollen Innenräumen und mehreren Zugängen zur Haupthalle. Im Lauf des 20. Jahrhunderts wurde der Bau jedoch ohne Rücksicht auf Verluste transformiert. Die aktuelle Sanierung dagegen erfolgte in engem Austausch mit der Denkmalpflege: Dach, Fassade, Haustechnik und Innenräume wurden saniert, störende Umbauten entfernt, Elemente mit Bedacht hinzugefügt und ein neues Dachgeschoss errichtet. Unter laufendem Bahnbetrieb wurde der Bau für zukunftsfähige Nutzungen ertüchtigt und in seiner Identität stiftenden Qualität wiederhergestellt.</p>
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
          href="https://www.google.com/maps/place/Bahnhofplatz+15" 
          target="_blank"
          rel="noopener noreferrer">
          Bahnhofplatz 15
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        SBB AG, Immobilien Development
      </p>
      <p>
        Architektur<br>
        Aebi & Vincent Architekten SIA AG
      </p>
      <p>
        Landschaftsarchitektur<br>
        -
      </p>
      <p>
        Fotografie<br>
        Thomas Telley, Adrian Scheidegger
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>