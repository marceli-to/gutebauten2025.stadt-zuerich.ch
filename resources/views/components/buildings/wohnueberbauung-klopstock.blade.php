<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="560" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="875" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="875" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="875" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Wo einst Gewerbe die Klopstockstrasse in der Enge prägte, steht ein neues Wohnhaus, das den bestehenden Blockrand fortsetzt und als Spitze endet. Der Ort ist privilegiert: Mächtige Eschen säumen die Strasse, dann fällt die Klopstockwiese zur Sihl ab – ein Grünraum, der dank Loggien und hohen Verglasungen in die Wohnräume zu fliessen scheint, während die Schlafzimmer am ruhigen Hof liegen. Auch das Erdgeschoss nutzt die Lage geschickt: Ein Niveausprung in den Wohnungen schafft ein strassenseitiges Hochparterre und einen überhohen Raum zum Hof. In der Spitze profitiert das Café von der dreiseitigen Orientierung.</p>
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
          Klopstockstrasse 19
        </a>
      </p>
      <p>
        Bauträgerschaft<br>De Capitani Immobilien AG
      </p>
      <p>
        Architektur<br>Michael Meier und Marius Hug Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>Müller Illien Landschaftsarchitektur GmbH
      </p>
      <p>
        Fotografie<br>Roman Keller Architekturfotografie 
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>