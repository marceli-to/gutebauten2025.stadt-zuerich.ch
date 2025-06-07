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
    <p>Wer von Westen in die Stadt hineinfährt, kennt die 1965 eröffnete Betriebszentrale Migros Herdern: Das denkmalgeschützte Ensemble aus Scheibenhochhaus, Flachbau und Spiralrampe setzt einen städtebaulichen Akzent im Industriequartier. So soll es auch in Zukunft sein: Das Hochhaus wurde statisch und energetisch ertüchtigt, die Haustechnik erneuert und die Backsteinfassaden wurden aufgedoppelt und rekonstruiert, sodass die Proportionen und das Erscheinungsbild erhalten blieben. Im Inneren gibt es zeitgemässe Bürogeschosse sowie ein Restaurant und Läden. Vor dem Gebäude lädt ein Platz mit wasserdurchlässigem Bodenbelag und grossen Bäumen zum Verweilen ein.</p>
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
          href="https://www.google.com/maps/place/Pfingstweidstrasse+101" 
          target="_blank"
          rel="noopener noreferrer">
          Pfingstweidstrasse 101
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        Genossenschaft Migros Zürich
      </p>
      <p>
        Architektur<br>
        Gigon Guyer Partner Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>
        Lorenz Eugster Landschaftsarchitektur und Städtebau GmbH
      </p>
      <p>
        Fotografie<br>
        Seraina Wirz Atelier für Architekturfotografie
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>