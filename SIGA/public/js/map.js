
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
var permLayer = L.layerGroup().addTo(map);
var routeLayer = L.layerGroup().addTo(map);

marNew = L.marker([-5.368469,105.290952]).addTo(permLayer);
var circle = L.circle([-5.368469,105.290952], {
    color: '#6BAF85',
    fillColor: '#71E99F',
    fillOpacity: 0.5,
    radius: 5000
}).addTo(permLayer);



let myLocation = L.latLng(-5.368469,105.290952);
let wp1 = new L.Routing.Waypoint(myLocation);
// console.log(cekJarak(-5.404235023962042,105.25340055462618));
// cekJarak(-5.362997007585995 ,105.28168936961073);
// addMarker(-5.359013097988684,105.3162449826625);
// addCircle(-5.359013097988684,105.3162449826625,5000,'#71E99F','#6BAF85');
