<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     
      <style>
        /* #map { height: 500px; } */
        html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#map {
			height: 100%;
			width: 100%;
		}
		.custom-popup {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
		}
		.custom-popup h3 {
			margin-top: 0;
			color: #007BFF;
		}
     </style>

</head>
<body>
<div id="map"></div>
</body>

<script>
var map = L.map('map').setView([-7.279090, 112.792796], 13);

// /**pakai google streets */
// googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
//     maxZoom: 20,
//     subdomains:['mt0','mt1','mt2','mt3']
// }).addTo(map);

// /**pakai open streetmap */
// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);

// /**pakai open googleHybrid */
// googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
//     maxZoom: 20,
//     subdomains:['mt0','mt1','mt2','mt3']
// }).addTo(map);

// Hybrid: s,h;
// Satellite: s;
// Streets: m;
// Terrain: p;
/////////////////////////////////////////////////////
/*Layer untuk Google Hybrid*/
var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    // Layer untuk OpenStreetMap
    var openStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    // Menambahkan kontrol layer untuk memungkinkan pergantian peta dasar
    var baseMaps = {
        "Streets": googleStreets,
        "traffic": openStreetMap,
        "satelite": googleHybrid
    };

    L.control.layers(baseMaps).addTo(map);
    // Set Google Streets sebagai default layer yang ditampilkan saat halaman dimuat
    googleHybrid.addTo(map);
////////////////////////////////////////

    // L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    //     maxZoom: 20,
    //     subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(map);

    var LeafIcon = L.Icon.extend({
    options: {
    shadowUrl: '',
    iconSize:     [30, 40], // ukuran ikon (lebih kecil)
    shadowSize:   [40, 50], // ukuran bayangan (disesuaikan)
    iconAnchor:   [15, 40], // titik jangkar ikon (tengah bawah ikon)
    shadowAnchor: [10, 50],  // titik jangkar bayangan (disesuaikan)
    popupAnchor:  [0, -35] // titik dari mana popup dibuka relatif ke iconAnchor
    }
});

/**fungsi untuk klik langtitude and longtitude */
// function onMapClick(e) {
//     alert("anda mengklik " + e.latlng);
// }

// map.on('click', onMapClick);

L.icon = function (options) {
    return new L.Icon(options);
};
var grenarea1 = new LeafIcon({iconUrl: 'assets/icons/grenarea.png'}),
    location1 = new LeafIcon({iconUrl: 'assets/icons/location.png'}),
    user1 = new LeafIcon({iconUrl: 'assets/icons/user.png'});
    
    L.marker([-7.275755, 112.7973779], {icon: grenarea1}).addTo(map).bindPopup("I am a grenarea Icon.");
    L.marker([-7.275431, 112.796391], {icon: location1}).addTo(map).bindPopup("I am a location icon.");
    L.marker([-7.275815, 112.799137], {icon: user1}).addTo(map).bindPopup("I am an user icon.");

</script>

</html>