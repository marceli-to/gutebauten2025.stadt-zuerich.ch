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
    <p>Das neue Kispi besteht aus zwei Teilen: dem Akutspital und dem Gebäude für Forschung und Lehre. Letzteres ist ein zylinderförmiges Volumen mit einem hohen Atrium, um das sich die Forschungsgruppen anordnen. Das Akutspital dagegen ist ein flacher Bau mit feingliedrigen Holzfassaden, das wie eine kleine Stadt funktioniert: Der Haupteingang evoziert ein Stadttor, die medizinischen Bereiche sind die Quartiere, auf jeder Etage führt ein zentraler Hauptweg an parkartigen Innenhöfen entlang, die Krankenzimmer auf dem Dach erscheinen wie einzelne kleine Holzhäuser – ein menschenfreundliches Haus mit viel Holz und ein Abschied vom «Spital als Maschine».</p>
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
          href="https://www.google.com/maps/place/Lenggstrasse+30" 
          target="_blank"
          rel="noopener noreferrer">
          Lenggstrasse 30
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        Kinderspital Zürich – Eleonorenstiftung
      </p>
      <p>
        Architektur<br>
        Herzog & de Meuron
      </p>
      <p>
        Landschaftsarchitektur<br>
        August + Margrith Künzel Landschaftsarchitekten AG
      </p>
      <p>
        Fotografie<br>
        Maris Mezulis, Michael Schmid Schmidphotos
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>