<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="630" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="560" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="875" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
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
    <p>Lang bevor die Themen Stadtklima und Schwammstadt in den Fokus der Öffentlichkeit rückten, erprobte ein kooperatives Verfahren im Hochhausgebiet Leutschenbach die klimaangepasste Stadtplanung. Der Freiraum zwischen den drei Wohnhochhäusern und dem Messeturm erlaubt eine öffentliche Wegverbindung auf privatem Grund, die dem Quartier zugutekommt. Freizeitnutzungen in den Erdgeschossen beleben die Plätze, während die Wohnhöfe diversen Lebensmodellen Raum bieten. Die Pflanzen und Wasserflächen tragen zur sommerlichen Kühlung bei; bewässert werden sie nach dem Schwammstadt-Prinzip mit Regenwasser, das auf den gestuften Dachflächen gesammelt wird.</p>
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
          href="https://www.google.com/maps/place/Hagenholzstrasse+41" 
          target="_blank"
          rel="noopener noreferrer">
          Hagenholzstrasse 41
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Leutschenbach AG, Nyffenegger Immobilien AG
      </p>
      <p>
        Architektur<br>Staufer & Hasler Architekten AG, von Ballmoos Partner Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>Mavo GmbH
      </p>
      <p>
        Fotografie<br>Roland Bernath, Georg Aerni
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>