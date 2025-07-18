<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>«Design for Disassembly» ist der Grundsatz für den Entwurf der provisorischen Sportbauten, die der Kanton Zürich an mehreren Standorten benötigt: Die Konstruktion aus Holzmodul- und Holzelementbauteilen erlaubt einen einfachen Transport, einen zügigen Auf- und Abbau und eine mehrfache Wiederverwendung. Damit dies in unterschiedlichen Umgebungen gut funktioniert, sowohl städtebaulich als auch in Bezug auf die Bedürfnisse der einzelnen Schulen, können die Volumen nach Bedarf kombiniert und angeordnet werden. Während die Innenräume immer gleich materialisiert sind, reagiert die Farbe der Fassaden auf die jeweiligen Schulbauten und deren Freiräume.</p>
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
          Brandschenkenstrasse 129
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Kanton Zürich, Baudirektion Hochbauamt
      </p>
      <p>
        Architektur<br>pool Architekten
      </p>
      <p>
        Landschaftsarchitektur<br>Balliana Schubert Landschaftsarchitekten AG
      </p>
      <p>
        Fotografie<br>Ralph Feiner Architekturfotografie
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>