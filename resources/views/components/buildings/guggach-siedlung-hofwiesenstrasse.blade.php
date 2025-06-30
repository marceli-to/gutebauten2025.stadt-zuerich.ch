<x-slideshow.wrapper>
  <x-slideshow.slide number="1" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="2" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="525" height="700" />
  <x-slideshow.slide number="3" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
  <x-slideshow.slide number="4" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="1050" height="700" />
  <x-slideshow.slide number="5" slug="{{ $building->slug }}" alt="{{ $building->title }}" width="933" height="700" />
</x-slideshow.wrapper>

<x-buildings.container :building="$building" hasVote="{{ $hasVote }}">
  <x-layout.article>
    <p>Eher klein sind die Wohnungen der Stiftung Einfach Wohnen in den achtgeschossigen Scheibenhäusern; dennoch wirken sie grosszügig. Sorgfältig gestaltete Schwellenräume, etwa in den Laubengängen, laden zur Begegnung ein; diverse Freiräume ermöglichen Gemeinschaft, Erholung, Sport, Spiel und Naturerlebnis. Mit der Kombination aus Wohnen, Park, Kindergarten, Gewerbe und Ateliers beleben die Neubauten die Gegend rund um das ehemalige Radiostudio. Sie schaffen günstige Wohnungen an zentraler Lage, sichern die Quartierversorgung, geben der Stadtentwicklung neue Impulse und sind – beispielsweise dank Photovoltaik – ökologisch im Betrieb.</p>
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
          Hofwiesenstrasse 183
        </a>
      </p>
      <p>
        Bauträgerschaft<br>Stiftung Einfach Wohnen
      </p>
      <p>
        Architektur<br>Donet Schäfer Reimer Architekten GmbH
      </p>
      <p>
        Landschaftsarchitektur<br>Atelier Loidl Landschaftsarchitekten Berlin GmbH
      </p>
      <p>
        Fotografie<br>Philip Heckhausen Architektur Photographie, Saskja Rosset Photography
      </p>
    </x-layout.article>
  </x-accordion.item>

  <x-accordion.item index="2" title="Kommentare">
    <x-layout.article>
      <x-buildings.comments :comments="$building->comments" />
    </x-layout.article>
  </x-accordion.item>

</x-accordion.wrapper>