@extends('layout.guest')
@section('seo_title', 'Info')
@section('seo_description', 'Gutes Bauen hat in Zürich Tradition. Die Stadt zeichnet seit rund 80 Jahren regelmässig die besten Bauwerke und Freiräume aus.')
@section('seo_image', '/media/opengraph.png')
@section('header')
  <x-headings.h1>
    Info
  </x-headings.h1>
@endsection
@section('content')


  {{-- <div class="bg-white border-b-3 xl:border-b-4 border-black">
    <x-layout.container class="py-30 lg:py-40 xl:py-70 flex flex-col gap-y-45 lg:gap-y-40">

      <x-layout.article class="flex items-start gap-x-20 xl:gap-x-30 group">
        <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
          <x-icons.vote.info class="text-white w-75 md:w-57 lg:w-69 xl:w-92 h-auto group-hover:animate-vote-xs group-hover:text-lumora transition-all duration-300 ease-in-out" />
        </div>
        <div>
          <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
            Abstimmen
          </x-headings.h2>
          <p>Zur Stimmabgabe aufs Herz klicken. Mit einem weiteren Klick kann die Stimme wieder entfernt werden. Pro Projekt kann eine Stimme abgegeben werden.</p>
        </div>
      </x-layout.article>

      <x-layout.article class="flex items-start gap-x-20 xl:gap-x-30 group">
        <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
          <x-icons.comment.info class="text-white w-74 md:w-51 lg:w-58 xl:w-76 h-auto group-hover:text-lumora transition-all duration-300 ease-in-out" />
        </div>      
        <div>
          <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
            Kommentieren
          </x-headings.h2>
          <p>Mit Klick auf die Sprechblase kann ein Kommentar verfasst werden. Der Kommentar wird geprüft und innerhalb 24 Stunden veröffentlicht.</p>
        </div>
      </x-layout.article>

      <x-layout.article class="flex items-start gap-x-20 xl:gap-x-30 group">
        <div class="min-w-75 md:min-w-57 lg:min-w-69 xl:min-w-92 shrink-0 mt-5">
          <x-icons.share.info class="text-white w-73 md:w-50 lg:w-57 xl:w-74 h-auto group-hover:animate-share group-hover:text-lumora transition-transform duration-300 ease-in-out" />
        </div>
        <div>
          <x-headings.h2 class="mb-4 md:mb-8 xl:mb-12">
            Teilen
          </x-headings.h2>
          <p>Mit Klick auf das Teilen-Symbol können Projekte über Social Media geteilt werden.</p>
        </div>
      </x-layout.article>
    </x-layout.container>
  </div> --}}

  <x-accordion.wrapper>
    <x-accordion.item index="1" title="Über die Auszeichnung" :open="true">
      <x-layout.article>
        <p>Gute Bauten und Freiräume prägen das Gesicht der Stadt. Sie haben in Zürich Tradition. Damit dies auch in Zukunft so bleibt, fördert die Stadt Zürich die Diskussion und zeichnet seit rund 80 Jahren regelmässig die besten Objekte und Anlagen aus.</p>
        <p>2025 führt sie zum 19. Mal eine Jurierung für die «Auszeichnung für gute Bauten» durch.</p>
        <p>Die Ausschreibung zur Auszeichnung für gute Bauten der Stadt Zürich findet alle fünf Jahre statt und läuft aktuell für Bauten von 2021 bis 2024. Dabei können Architektur- und Landschaftsarchitekturbüros sowie Bauherrschaften teilnehmen, welche in diesem Zeitraum ihre Projekte realisiert und fertiggestellt haben. Eine interdisziplinär zusammengesetzte Jury wählt aus den eingereichten Projekten die besten Gebäude und gestalteten Freiräume und zeichnet diese aus.</p>
        <p>Weitere Informationen zur <a href="https://www.stadt-zuerich.ch/de/stadtleben/kultur/kultur-leben/gute-bauten.html" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" target="_blank">Auszeichnung für gute Bauten</a>.</p>
      </x-layout.article>
    </x-accordion.item>
    
    <x-accordion.item index="2" title="Publikumspreis">
      <x-layout.article>
        <p>Neben den Preisen der Fachjury wird auch ein Publikumspreis verliehen. Das Online-Voting lief vom 8. Juli bis 22. August auf dieser Webseite. Alle interessierten Personen konnten ihre Stimme für eines von 16 beeindruckenden Hochbau- und Freiraumprojekten abgeben. Das Projekt mit den meisten Stimmen erhält den Publikumspreis.</p>
        {{-- <p>Die Projekte können auch kommentiert werden. Das Amt für Städtebau behält sich jedoch vor, Beiträge zu kürzen oder nicht zu publizieren. Dies gilt insbesondere für ehrverletzende, rassistische, unsachliche oder themenfremde Kommentare.</p> --}}
      </x-layout.article>  
    </x-accordion.item>
    
    <x-accordion.item index="3" title="Beurteilungskriterien">
      <x-layout.article>
        <p>Für die Auszeichnung gute Bauten wird eine ganzheitliche Beurteilung von Bauwerken und Freiräumen vorgenommen und Beiträge ausgezeichnet, die einen aussergewöhnlichen Beitrag zu einer vielfältigen, durchmischten und nachhaltigen Stadt leisten.</p>
        <p>Die angewandten Kriterien bilden die Vielfalt des guten Bauens ab:</p>
        <p>Städtebau – Einordnung in den räumlichen Kontext<br>Es wird ein herausragender Beitrag zur Qualität des räumlichen Kontextes und zur Identität eines Ortes geleistet.</p>
        <p>Freiraum – Förderung von Aufenthalt, Begegnung und Grün<br>Räume, Plätze, Grünflächen und Siedlungsfreiräume bieten eine hohe Aufenthaltsqualität und Nutzungsvielfalt. Sie leisten einen herausragenden Beitrag zur Biodiversität und Klimaanpassung.</p>
        <p>Architektur – Weiterentwicklung im Bestand<br>Das Objekt weist eine zukunftsweisende Weiterentwicklung der gebauten und unbebauten Umgebung auf und bietet Entfaltungsmöglichkeiten für die wachsende Bevölkerung. Wertvollem Bestand wird vorbildlich Sorge getragen.</p>
        <p>Gesellschaft – Berücksichtigung sozialräumlicher Aspekte<br>Das Projekt bietet einen hohen Nutzwert, trägt zur Identifikation mit dem Lebensraum bei und fördert den sozialen Austausch, die soziale Vielfalt und Inklusion.</p>
        <p>Ökonomie – Schaffung wirtschaftlicher Mehrwerte<br>Das Objekt zeichnet sich durch eine hohe Nutzungsflexibilität und Funktionalität aus. Lange Lebenszyklen und nachhaltige Bewirtschaftung schaffen einen Mehrwert.</p>
        <p>Ökologie – Beitrag zu Klimaschutz, Klimaanpassung und Stadtnatur<br>Das Projekt zeugt von einem sorgfältigen und verantwortungsvollen Umgang mit Ressourcen, optimiert den Energieverbrauch und weist eine geringe Belastung der natürlichen Umwelt auf. Durch herausragende Innovationsleistung wird ein Beitrag zu Klima und Natur geleistet.</p>
      </x-layout.article>
    </x-accordion.item>

    <x-accordion.item index="4" title="Jury">
      <x-layout.article>
        <p>Die Jury setzt sich aus folgenden Expert*innen und stimmberechtigten Mitgliedern des Stadtrats und der Verwaltung zusammen:</p>
        <p>
          Marianne Baumgartner, Dipl. Arch. ETH SIA BSA<br>
          Philip Blum, lic. phil. UZH, MAS Real Estate Management HWZ, eidg. dipl. Immobilientreuhänder<br>
          Thomas Kissling, Architekt, MSc ETH Arch / SIA<br>
          Ascan Mergenthaler, Dipl. Ing. Universität Stuttgart SIA BSA ARB<br>
          Christian Schneider, Dipl. Natw. ETH / Energie-Ing. NDS / SIA<br>
          Christina Schumacher, lic. phil. Soziologin, DAS Raumplanung ETHZ<br>
          Volker Staab, Prof. Dipl. Arch. ETH 
        </p>
        <p>
          André Odermatt, Vorsteher Hochbaudepartement (Vorsitz)<br>
          Corine Mauch, Stadtpräsidentin<br>
          Simone Brander, Vorsteherin Tiefbau- und Entsorgungsdepartement<br>
          Katrin Gügler, Direktorin Amt für Städtebau<br>
          Christine Bräm, Direktorin Grün Stadt Zürich<br>
          Anna Schindler, Direktorin Stadtentwicklung Zürich 
        </p>
      </x-layout.article>
    </x-accordion.item>

    <x-accordion.item index="5" title="Preisverleihung und Ausstellung">
      <x-layout.article>
        <p>Die Preisverleihung findet am 2. Oktober 2025 statt. Die ausgezeichneten Bauten werden zudem in einer Ausstellung im <a href="https://www.stadt-zuerich.ch/de/aktuell/veranstaltungen/planen-und-bauen/ausstellung-auszeichnung-fuer-gute-bauten.html" target="_blank" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" aria-label="Podiums" rel="noopener noreferrer">ZAZ BELLERIVE</a> Zentrum Architektur Zürich vom 3. Oktober bis 9. November 2025 präsentiert. Am 5. November 2025 findet in der Ausstellung zusätzlich ein <a href="https://www.stadt-zuerich.ch/de/aktuell/veranstaltungen/planen-und-bauen/podiumsdiskussion-auszeichnung-fuer-gute-bauten.html" target="_blank" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" aria-label="Podiums" rel="noopener noreferrer">Podium</a> statt.</p>
      </x-layout.article>
    </x-accordion.item>

    <x-accordion.item index="6" title="Impressum">
      <x-layout.article>
        <p>
          Gesamtredaktion: Amt für Städtebau<br>
          Kontakt: <a href="mailto:afs-kommunikation@zuerich.ch" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" title="afs-kommunikation@zuerich.ch">afs-kommunikation@zuerich.ch</a><br>
          Projekttexte: Judit Solt<br>
          Gesamtkonzept: Vieceli & Cremers, <a href="https://viecelicremers.com" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" title="viecelicremers.com" target="_blank">viecelicremers.com</a>, Zürich<br>
          Gestaltung Webseite: Nadine Ochsner, <a href="https://nostudio.ch" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" title="nostudio.ch" target="_blank">nostudio.ch</a>, Zürich in Zusammenarbeit mit Vieceli & Cremers<br>
          Programmierung: Marcel Stadelmann, <a href="https://marceli.to" class="underline underline-offset-4 decoration-1 xl:decoration-2 hover:no-underline" title="marceli.to" target="_blank">marceli.to</a>, Zürich<br>
          © 2025, bei den Autorinnen und Autoren
      </x-layout.article>
    </x-accordion.item>

  </x-accordion.wrapper>
@endsection