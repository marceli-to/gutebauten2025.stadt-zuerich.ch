<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1244" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Hell, heiter und festlich wirkte das Kongresshaus zu seiner Bauzeit 1939. Das hohe Foyer durchmass die ganze Tiefe des Gebäudes; wer es durchschritt, erblickte die Seepromenade, Gärten und Terrassen, Treppen und Raumfluchten; von der Terrasse sah man den See und die Alpen. Viele Qualitäten dieses einmaligen Baus wurden verunklärt, nun sind sie wieder erlebbar. Die Erneuerung umfasste eine mutige Raumrochade, eine Erweiterung des Gartensaaltrakts, den Rückbau des Panoramasaals aus den 1980er-Jahren und Ertüchtigungsmassnahmen. Alte und neue Elemente – das älteste, die Tonhalle, stammt von 1895 – fügen sich wieder zu einem harmonischen Ganzen.</p>
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
          Claridenstrasse 5
        </a>
      </p>
      <p>
        Bauträgerschaft<br>
        Kongresshaus-Stiftung Zürich
      </p>
      <p>
        Architektur<br>
        ARGE Boesch Diener (Elisabeth & Martin Boesch Architekten, Zürich / Diener & Diener Architekten, Basel)
      </p>
      <p>
        Landschaftsarchitektur<br>
        Vogt Landschaftsarchitekten AG
      </p>
      <p>
        Fotografie<br>
        Georg Aerni
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>