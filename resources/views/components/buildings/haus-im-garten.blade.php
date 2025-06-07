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
    <p>In ländlicher Umgebung am Stadtrand erbaut, erinnert das neue Wohnhaus mit seinem Volumen und seinen Vordächern an landwirtschaftliche Nutzbauten. Innen dagegen ist es höchst unkonventionell. Die 14 Wohnungen können als einziges Raumkontinuum genutzt oder durch Schiebewände in mehrere Zimmer unterteilt werden, auch ungewöhnliche Kombinationen sind dabei möglich. Im Erdgeschoss teilen sich die Bewohnenden eine grosse gemeinsame Küche samt Ess- und Kaminbereich sowie einen Waschsalon, und auch der Garten ist gemeinschaftlich. Dank Solarmodulen auf dem Dach für Strom und Warmwasser produziert das Haus mehr Energie, als es verbraucht.</p>
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
          href="https://www.google.com/maps/place/Tobelhofstrasse+242" 
          target="_blank"
          rel="noopener noreferrer">
          Tobelhofstrasse 242
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Irma Peter 
      </p>
      <p>
        Architektur<br>Loeliger Strub Architektur
      </p>
      <p>
        Landschaftsarchitektur<br>PERMATUR
      </p>
      <p>
        Fotografie<br>Seraina Wirz Atelier für Architekturfotografie 
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>