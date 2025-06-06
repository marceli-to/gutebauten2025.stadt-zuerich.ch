import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import proj4 from 'proj4';
import 'proj4leaflet';

function init() {
  const isMobile = window.innerWidth < 1280;
  const markerList = [];
  let currentPopup = null;

  // ─── CRS & Map Setup ───────────────────────────────────────────
  const lv95 = {
    epsg: 'EPSG:2056',
    def: '+proj=somerc +lat_0=46.95240555555556 +lon_0=7.439583333333333 +k_0=1 +x_0=2600000 +y_0=1200000 +ellps=bessel +towgs84=674.374,15.056,405.346,0,0,0,0 +units=m +no_defs',
    resolutions: [67.7333333333, 33.8666666667, 16.9333333333, 8.4666666667, 4.2333333333, 2.1166666667, 1.0583333333, 0.5291666667, 0.2645833333, 0.1322916667, 0.0661458333],
    origin: [2480237.0, 1315832.0]
  };

  const crs = new L.Proj.CRS(lv95.epsg, lv95.def, {
    resolutions: lv95.resolutions,
    origin: lv95.origin
  });

  /** Padded bounds (removed in favor of auto bounds) */
  // Padded bounds (~5km buffer) to allow extra room for popups and navigation
  // const latPad = 0.045;
  // const lngPad = 0.067;
  
  // const bounds = {
  //   content: L.latLngBounds([47.3599, 8.474826], [47.412927, 8.593506]),
  //   padded: L.latLngBounds(
  //     [47.3599 - latPad, 8.474826 - lngPad],
  //     [47.412927 + latPad, 8.593506 + lngPad]
  //   )
  // };
  /** // Padded bounds */

  /** Auto bounds */
  const markerPositions = _buildings.map(b => L.latLng(b.lat, b.long));
  const autoBounds = L.latLngBounds(markerPositions);
  
  const bounds = {
    content: autoBounds,
    padded: autoBounds.pad(0.6) // 60% padding in all directions for popup space
  };
  /** // Auto bounds */

  const map = L.map('map', {
    crs,
    tap: false,
    maxBounds: bounds.padded,
    maxBoundsViscosity: 0.5,
    maxZoom: 8,
  });

  /** Removed as it was not working properly */
  // const calculatedMinZoom = map.getBoundsZoom(bounds.padded, true);
  // map.setMinZoom(calculatedMinZoom);

  const mapTypes = {
    gray: 'Basiskarte_Zuerich_Raster_Grau',
    color: 'Basiskarte_Zuerich_Raster',
  };

  L.tileLayer(`https://www.ogd.stadt-zuerich.ch/mapproxy/wmts/1.0.0/${mapTypes.color}/default/ktzh/{z}/{y}/{x}.png`, {
    maxZoom: 8,
    minZoom: 1,
    tileSize: 512
  }).addTo(map);

  map.fitBounds(bounds.content, {
    padding: [40, 40],
  });

  // ─── Marker Icons ──────────────────────────────────────────────
  const markerOpts = {
    size: [30, 30],
    anchor: [10, 20],
    popupAnchor: [0, -10]
  };

  const createIcon = (file) =>
    L.icon({
      iconUrl: `../img/${file}`,
      iconSize: markerOpts.size,
      iconAnchor: markerOpts.anchor,
      popupAnchor: markerOpts.popupAnchor
    });

  const markerIcons = {
    default: isMobile ? createIcon('marker-sm.svg') : createIcon('marker.svg'),
    active: isMobile ? createIcon('marker-active-sm.svg') : createIcon('marker-active.svg')
  };

  // ─── Popup Logic ───────────────────────────────────────────────
  const getPopupOptions = () => ({
    minWidth: isMobile ? 200 : 255,
    maxWidth: isMobile ? 200 : 255,
    autoPan: true,
    autoPanPadding: [40, 40]
  });

  const buildPopupHTML = (b) => `
      <a 
        href="/${b.slug}" 
        title="${b.title}" 
        class="w-full border-3 xl:border-4 border-black font-sans bg-lumora block text-black leading-none group">
        <img 
          src="/media/${b.slug}/map-${b.slug}.jpg" 
          alt="${b.title}" 
          width="260"
          height="162"
          class="w-full h-auto block aspect-[16/10] object-cover" />
        <span class="block bg-lumora relative p-10 md:pb-50">
          <h2 class="text-sm xl:text-md !text-black pr-14 md:pr-18">${b.title}</h2>
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute size-14 md:size-18 right-10 bottom-10 xl:right-12 xl:bottom-12 group-hover:rotate-45 transition-all duration-200">
            <path d="M17.5 12H15.5V3.41406L1.70703 17.207L0.292969 15.793L14.0859 2H5V0H17.5V12Z" fill="black"/>
          </svg>
        </span>
      </a>`;

  // ─── Marker Creation ───────────────────────────────────────────
  function addMarkers(buildings) {
    buildings.forEach((b) => {
      const marker = L.marker([b.lat, b.long], { icon: markerIcons.default })
        .on('click', (e) => {
          resetMarkers();
          e.target.setIcon(markerIcons.active);
          currentPopup = { marker: e.target, building: b };
          e.target.getPopup().on('remove', () => {
            resetMarkers();
            currentPopup = null;
          });
        })
        .addTo(map)
        .bindPopup(buildPopupHTML(b), getPopupOptions());

      markerList.push(marker);
    });

    if (markerList.length) {
      const bounds = L.latLngBounds(markerList.map(m => m.getLatLng()));
      map.fitBounds(bounds, {
        padding: [40, 40],
        maxZoom: 8
      });
    }
  }

  function resetMarkers() {
    markerList.forEach((m) => m.setIcon(markerIcons.default));
  }

  // ─── Resize Handler ────────────────────────────────────────────
  window.addEventListener('resize', () => {
    if (currentPopup) {
      const b = currentPopup.building;
      const popupHTML = buildPopupHTML(b);
      currentPopup.marker.setPopupContent(popupHTML);
      Object.assign(currentPopup.marker.getPopup().options, getPopupOptions());
      currentPopup.marker.openPopup();
    }

    if (markerList.length) {
      const bounds = L.latLngBounds(markerList.map(m => m.getLatLng()));
      map.fitBounds(bounds, {
        padding: [40, 40],
        maxZoom: 8
      });
    }
  });

  // ─── Load Markers ──────────────────────────────────────────────
  if (Array.isArray(_buildings)) {
    addMarkers(_buildings);
  }
}

document.addEventListener('DOMContentLoaded', init);
