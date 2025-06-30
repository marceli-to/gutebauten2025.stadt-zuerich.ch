<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="934" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
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
          href="{{ $building->maps }}" 
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
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>