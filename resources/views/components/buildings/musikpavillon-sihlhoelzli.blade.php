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
    <p>Einst bezeichnete die Wiediker Post ihn als «famose Muschel», und in der Tat wirkt der Betonpavillon in der Sportanlage Sihlhölzli wie ein offenes Schalentier. Einst als Musikpavillon erstellt, stand der Bau über Jahrzehnte leer. Nun wurde er saniert und erfreut sich als kostenlos nutzbare Calisthenics-Anlage neuer Beliebtheit. Das Sportpodest ist wie die Leichtathletik-Laufbahn nebenan mit rotem Tartanbelag bezogen. Im Untergeschoss sind Garderoben untergebracht. Der Umbau erfolgte mit Sorgfalt und Liebe zum Detail: Die Eingriffe sind schadlos wieder rückbaubar, Formen und Farben respektieren den Charakter des Baudenkmals.</p>
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
          href="https://www.google.com/maps/place/Manessestrasse+19" 
          target="_blank"
          rel="noopener noreferrer">
          Manessestrasse 19
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        Immobilien Stadt Zürich c / o Amt für Hochbauten
      </p>
      <p>
        Architektur<br>
        Camponovo Baumgartner GmbH
      </p>
      <p>
        Landschaftsarchitektur<br>
        -
      </p>
      <p>
        Fotografie<br>
        Sven Högger Photographer, Camponovo Baumgartner GmbH
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>