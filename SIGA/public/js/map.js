
function addMarker(lat, long){
    var marker = L.marker([lat, long],).addTo(map);
    return marker;
}

function addCircle(lat,long,radius,fillColor,strokeColor){
    var circle = L.circle([lat, long], {
        color: strokeColor,
        fillColor: fillColor,
        fillOpacity: 0.5,
        radius: radius
    }).addTo(map);
    return circle;
}

function popMarker(lat,lang,title){
    marker = L.marker([lat,lang]).addTo(markerLayer)
    marker.bindPopup(title).openPopup();
}

function clearMarker(){
    markerLayer.clearLayers();
    map.closePopup();
}

var map = L.map('map').setView([-5.4088848, 105.2579765], 12);
ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken:ACCESS_TOKEN
}).addTo(map);

var markerLayer = L.layerGroup().addTo(map);

// addMarker(-5.359013097988684,105.3162449826625);
// addCircle(-5.359013097988684,105.3162449826625,5000,'#71E99F','#6BAF85');
