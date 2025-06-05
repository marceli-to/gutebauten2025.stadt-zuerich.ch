import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import proj4 from 'proj4';
import 'proj4leaflet';

const _projects = window._projects || []; // if you still define it in Blade

(function () {
  const mq = {
    mobile: window.matchMedia('(max-width: 700px)'),
    smallScreen: window.matchMedia('(min-width: 700px)'),
    largeScreen: window.matchMedia('(min-width: 1024px)'),
  };

  // Default zoom and center
  let zoomLevel = 2;
  let centerLat = 47.37;
  let centerLng = 8.53;

  if (mq.mobile.matches) {
    zoomLevel = 1;
    centerLat = 47.375237643601906;
    centerLng = 8.53714336229832;
  } else if (mq.largeScreen.matches) {
    zoomLevel = 3;
    centerLat = 47.38320885381473;
    centerLng = 8.5457634705359;
  } else if (mq.smallScreen.matches) {
    zoomLevel = 2;
    centerLat = 47.39210544462277;
    centerLng = 8.548022401252375;
  }

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

  const sw = L.latLng(47.31772500499832, 8.451570615923625);
  const ne = L.latLng(47.515225463667726, 8.645079458079913);
  const bounds = L.latLngBounds(sw, ne);

  const myMap = new L.Map('map', {
    tap: false,
    crs: crs,
    maxBounds: bounds,
    minZoom: zoomLevel,
    maxZoom: 8,
  });

  console.log(crs.options.resolutions.length);

  L.tileLayer('https://www.ogd.stadt-zuerich.ch/mapproxy/wmts/1.0.0/Basiskarte_Zuerich_Raster_Grau/default/ktzh/{z}/{y}/{x}.png', {
    maxZoom: 8,
    minZoom: 1,
    tileSize: 512
  }).addTo(myMap);

  myMap.setView(L.latLng(centerLat, centerLng), zoomLevel);

  const marker = L.icon({
    iconUrl: '../img/marker.svg',
    iconSize: [30, 44],
    iconAnchor: [15, 35],
    popupAnchor: [0, -44],
  });

  const marker_active = L.icon({
    iconUrl: '../img/marker-active.svg',
    iconSize: [30, 44],
    iconAnchor: [15, 35],
    popupAnchor: [0, -44],
  });

  const popupOpts = { minWidth: 240, maxWidth: 'auto', autoPanPadding: [30, 30] };
  const popupTpl = `
    <div class="leaflet-popup-content-body">
      <a href="/%slug%" title="%title%">
        <img width="300" height="225" src="/assets/media/%slug%/%img%-map.jpg" alt="%title%">
      </a>
      <div class="leaflet-popup-content-body__text">
        <a href="/%slug%" class="icon-arrow-up" title="%title%">
          <h2><span>%title%</span></h2>
        </a>
      </div>
    </div>
  `;

  const _markers = [];

  if (typeof _projects !== 'undefined' && Array.isArray(_projects)) {
    _projects.forEach((b) => {
      let content = popupTpl;
      content = content.replaceAll('%title%', b.title);
      content = content.replace('%img%', b.slug);
      content = content.replaceAll('%slug%', b.slug);

      const markerInstance = L.marker([b.lat, b.lng], { icon: marker })
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
