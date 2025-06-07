<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1280" height="600" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1280" height="600" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1280" height="600" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1280" height="600" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1280" height="600" />
</x-slideshow.wrapper>

<div id="interaction-app">
  <interaction
    slug="{{ $building->slug }}"
    title="{{ $building->title }}"
    url="{{ route('page.building', $building->slug) }}"
    :has_vote="@json((bool) $hasVote)"
  ></interaction>
</div>

<x-buildings.container>
  <x-layout.article>
    <p>Die 1955 errichtete Bullingerkirche wurde als provisorischer Ratssaal für die Parlamente des Kantons und der Stadt Zürich umgebaut – mit möglichst wenigen Eingriffen in den Bestand und so, dass alle neuen Bauteile wieder rückgebaut werden können. Drei mit Filzbändern umflochtene konzentrische Ringe, die von der Decke hängen und die Raummitte betonen, tragen linienförmige Leuchten und sorgen für eine gute Akustik. Dieses Element erfüllt nicht nur viele praktische Anforderungen, es verändert auch den Charakter des Raumes: Der längs gerichtete Andachtsraum wird zu einem repräsentativen, würdevollen Zentralraum für die politische Debatte.</p>
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
          href="https://www.google.com/maps/place/Bullingerstrasse+4" 
          target="_blank"
          rel="noopener noreferrer">
          Bullingerstrasse 4
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Reformierte Kirche Zürich
      </p>
      <p>
        Architektur<br>Ernst Niklaus Fausch Partner AG
      </p>
      <p>
        Landschaftsarchitektur<br>-
      </p>
      <p>
        Fotografie<br>Hannes Henz Architekturfotograf
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>