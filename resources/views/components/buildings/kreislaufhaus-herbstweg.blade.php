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
    <p>Dreizehn Wohnungen statt zwei Reihenhäuser – auf der fast gleichen Grundfläche: Der Neubau in Oerlikon steht beispielhaft für eine verträgliche Verdichtung des Arbeiterquartiers. Eine schlanke, rückbaubar verschraubte Tragkonstruktion aus Stahl beidseits der mittleren Brandmauer bildet das Skelett des Gebäudes, ausgefacht mit Verbunddecken und nichttragenden Innenwänden. Die sichtbare Stahlkonstruktion mit ihren Stützen und Trägern erzeugt eine lebendige Raumstimmung und schneidet, weil alle Materialien effizient eingesetzt sind, auch ökologisch gut ab. Raffinierte Grundrisse und spannende Blickbezüge werten auch die kleineren Wohnungen auf.</p>
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
          href="https://www.google.com/maps/place/Herbstweg+6" 
          target="_blank"
          rel="noopener noreferrer">
          Herbstweg 6
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        Cornelia Katumba und Raphael Gschwend | Beate und Roland Egli
      </p>
      <p>
        Architektur<br>
        Graser Troxler Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>
        Graser Troxler Architekten AG
      </p>
      <p>
        Fotografie<br>
        Philip Heckhausen Architektur Photographie, Karin Gauch und Fabien Schwartz
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>