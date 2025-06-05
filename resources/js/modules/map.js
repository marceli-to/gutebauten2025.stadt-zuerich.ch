import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import proj4 from 'proj4';
import 'proj4leaflet';

(function () {
  // Zoom and fallback center
  const zoomLevel = 3;
  const centerLat = 47.37;
  const centerLng = 8.53;

  // LV95 / EPSG:2056 definition
  const lv95 = {
    epsg: 'EPSG:2056',
    def: '+proj=somerc +lat_0=46.95240555555556 +lon_0=7.439583333333333 +k_0=1 +x_0=2600000 +y_0=1200000 +ellps=bessel +towgs84=674.374,15.056,405.346,0,0,0,0 +units=m +no_defs',
    resolutions: [67.7333333333, 33.8666666667, 16.9333333333, 8.4666666667, 4.2333333333, 2.1166666667, 1.0583333333, 0.5291666667, 0.2645833333, 0.1322916667, 0.0661458333],
    origin: [2480237.0, 1315832.0],
    bounds: L.bounds([2480237.000000, 1062032.000000], [2846837.000000, 1315832.000000])
  };

  const crs = new L.Proj.CRS(lv95.epsg, lv95.def, {
    resolutions: lv95.resolutions,
    origin: lv95.origin
  });

  // Original content bounds
  const contentSW = L.latLng(47.359900, 8.474826);
  const contentNE = L.latLng(47.412927, 8.593506);
  const contentBounds = L.latLngBounds(contentSW, contentNE);

  // Apply ~5km padding (0.045° latitude, 0.067° longitude)
  const latPad = 0.045;
  const lngPad = 0.067;

  const paddedSW = L.latLng(47.359900 - latPad, 8.474826 - lngPad);
  const paddedNE = L.latLng(47.412927 + latPad, 8.593506 + lngPad);
  const paddedBounds = L.latLngBounds(paddedSW, paddedNE);

  const myMap = new L.Map('map', {
    tap: false,
    crs: crs,
    maxBounds: paddedBounds,           // allow room for popups
    maxBoundsViscosity: 0.5,           // soft panning resistance
    minZoom: zoomLevel,
    maxZoom: 8,
  });

  L.tileLayer('https://www.ogd.stadt-zuerich.ch/mapproxy/wmts/1.0.0/Basiskarte_Zuerich_Raster_Grau/default/ktzh/{z}/{y}/{x}.png', {
    maxZoom: 8,
    minZoom: 1,
    tileSize: 512
  }).addTo(myMap);

  // Zoom to actual content bounds, leave padded room for popups
  myMap.fitBounds(contentBounds, {
    padding: [40, 40],
    maxZoom: zoomLevel
  });

  // Marker icons
  const marker = L.icon({
    iconUrl: '../img/marker.svg',
    iconSize: [30, 30],
    iconAnchor: [15, 30],
    popupAnchor: [0, -10],
  });

  const marker_active = L.icon({
    iconUrl: '../img/marker-active.svg',
    iconSize: [30, 30],
    iconAnchor: [15, 30],
    popupAnchor: [0, -20],
  });

  const popupOpts = {
    minWidth: 260,
    maxWidth: 260,
    autoPan: true,
    autoPanPadding: [40, 40]
  };

  const popupTpl = `
    <div class="w-[260px] border-[3px] border-black font-sans">
      <a href="/%slug%" title="%title%" class="block text-black leading-none">
        <img 
          src="../media/buildings/%slug%/map-%img%.jpg" 
          alt="%title%" 
          class="w-full h-auto block"
        />
      </a>
      <div class="bg-lumora relative p-10">
        <a href="/%slug%" title="%title%" class="no-underline text-black block">
          <h2 class="text-sm !text-black">%title%</h2>
        </a>
      </div>
    </div>
  `;

  const _markers = [];

  if (typeof _buildings !== 'undefined' && Array.isArray(_buildings)) {
    _buildings.forEach((b) => {
      let content = popupTpl;
      content = content.replaceAll('%title%', b.title);
      content = content.replace('%img%', b.slug);
      content = content.replaceAll('%slug%', b.slug);

      const markerInstance = L.marker([b.lat, b.long], { icon: marker })
        .on('click', activeMarker)
        .addTo(myMap)
        .bindPopup(content, popupOpts);

      _markers.push(markerInstance);
    });
  }

  function activeMarker(e) {
    resetMarker();
    const layer = e.target;
    layer.setIcon(layer.options.icon === marker ? marker_active : marker);
    layer.getPopup().on('remove', resetMarker);
  }

  function resetMarker() {
    _markers.forEach((m) => m.setIcon(marker));
  }

})();
