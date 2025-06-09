<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
</x-slideshow.wrapper>



<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Wie wollen wir morgen arbeiten? Ein Neubau lotet aus, was in der Industrie- und Gewerbezone der Binz möglich ist. Die Ausnützung des Grundstücks unter Berücksichtigung der Bauvorschriften führt zu einem abgeschrägten Volumen mit Balkonen und begrünten Terrassen. Je nach Lage im Haus entstehen Räume in variierender Höhe und Fläche. Sie ermöglichen einzigartige Gewerbe- und Büroarbeitsplätze; überhohe Räume, die zwei Etagen verbinden, und ein Treppenweg entlang der Terrassen fördern den Austausch unter der Mieterschaft. Auch der Hof, die begrünten Terrassen und die Freitreppe zum Hof eignen sich als Begegnungs- und Aufenthaltsräume.</p>
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
          href="https://www.google.com/maps/place/Binzstrasse+29" 
          target="_blank"
          rel="noopener noreferrer">
          Binzstrasse 29
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Swiss Life Asset Management AG
      </p>
      <p>
        Architektur<br>EM2N Architekten AG
      </p>
      <p>
        Landschaftsarchitektur<br>Balliana Schubert Landschaftsarchitekten AG
      </p>
      <p>
        Fotografie<br>Kuster Frey 
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>