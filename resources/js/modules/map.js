(function() {

  let mq = {
    mobile: window.matchMedia('(max-width: 700px)'),
    smallScreen: window.matchMedia('(min-width: 700px)'),
    largeScreen: window.matchMedia('(min-width: 1024px)'),
  };

  // Define zoom levels
  var zoomLevel = 2;
  var centerLat = 47.37;
  var centerLng = 8.53;

  if (mq.mobile.matches) {
    zoomLevel = 1;
    centerLat = 47.375237643601906;
    centerLng = 8.53714336229832;
  }

  if (mq.smallScreen.matches) {
    zoomLevel = 2;
    centerLat = 47.39210544462277;
    centerLng = 8.548022401252375;
  }

  if (mq.largeScreen.matches) {
    zoomLevel = 3;
    centerLat = 47.38320885381473;
    centerLng = 8.5457634705359;
  }


  var lv95 = {
    epsg: 'EPSG:2056',
    def: '+proj=somerc +lat_0=46.95240555555556 +lon_0=7.439583333333333 +k_0=1 +x_0=2600000 +y_0=1200000 +ellps=bessel +towgs84=674.374,15.056,405.346,0,0,0,0 +units=m +no_defs',
    resolutions: [67.7333333333, 33.8666666667, 16.9333333333, 8.4666666667, 4.2333333333, 2.1166666667, 1.0583333333, 0.5291666667, 0.2645833333, 0.1322916667, 0.0661458333],
    origin: [2480237.0, 1315832.0],
    bounds:  L.bounds([2480237.000000, 1062032.000000], [2846837.000000, 1315832.000000])
  };

  var crs = new L.Proj.CRS(lv95.epsg, lv95.def, { 
    resolutions: lv95.resolutions, 
    origin: lv95.origin
  });

  // Create the LatLngBounds object like this..
  var sw = L.latLng(47.31772500499832, 8.451570615923625),
      ne = L.latLng(47.515225463667726, 8.645079458079913),
      bounds = L.latLngBounds(sw, ne);

  var myMap = new L.Map('map', {
    tap: false,
    crs: crs,
    maxBounds: bounds,
    minZoom: zoomLevel,
    maxZoom: 8, // was crs.options.resolutions.length
  });

  console.log(crs.options.resolutions.length);

  L.tileLayer('https://www.ogd.stadt-zuerich.ch/mapproxy/wmts/1.0.0/Basiskarte_Zuerich_Raster_Grau/default/ktzh/{z}/{y}/{x}.png',{
    maxZoom: 8, // crs.options.resolutions.length,
    minZoom: 1,
    tileSize: 512
  }).addTo(myMap);

  myMap.setView(L.latLng(centerLat,centerLng),zoomLevel);

  var marker = L.icon({
    iconUrl: '/assets/img/icons/marker.svg',
    iconSize: [30, 44],
    iconAnchor: [15, 35],
    popupAnchor: [0, -44],
  });

  var marker_active = L.icon({
    iconUrl: '/assets/img/icons/marker-active.svg',
    iconSize: [30, 44],
    iconAnchor: [15, 35],
    popupAnchor: [0, -44],
  });

  // , keepInView: true
  var popupOpts = {minWidth: 240, maxWidth: 'auto', autoPanPadding: [30,30]};
  var popupTpl  = '<div class="leaflet-popup-content-body">' +
                    '<a href="/%slug%" title="%title%">' +
                      '<img width="300" height="225" src="/assets/media/%slug%/%img%-map.jpg">' +
                    '</a>' +
                    '<div class="leaflet-popup-content-body__text">' +
                      '<a href="/%slug%" class="icon-arrow-up" title="%title%">' +
                        '<h2><span>%title%</span></h2>' +
                      '</a>' +
                    '</div>'+
                  '</div>';

  var _markers = [];

  _buildings.forEach((b) => {
    var content = popupTpl;
    content = content.replaceAll('%title%', b.title);
    content = content.replace('%img%', b.slug);
    content = content.replaceAll('%slug%', b.slug);

    _markers.push(
      L.marker([b.lat, b.lng], {icon: marker})
        .on('click', activeMarker)
        .addTo(myMap)
        .bindPopup(content,popupOpts)
    );
  });

  function activeMarker(e) {
    resetMarker();
    var layer = e.target;
    layer.setIcon(layer.options.icon == marker ? marker_active : marker);
    layer.getPopup().on('remove', resetMarker);
  }

  function resetMarker() {
    _markers.forEach(function(i){
      i.setIcon(marker);
    });
  }

})();