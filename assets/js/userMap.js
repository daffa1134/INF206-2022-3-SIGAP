let map,
    markers = [],
    namaApotek = ["Apotek Laris", "Apotek Sejahtera", "Apotek Mangga"];
const apotek = [
    { lat: 5.562762993736273, lng: 95.32864104874757 },
    { lat: 5.5607209257230545, lng: 95.32791597386056 },
    { lat: 5.560118305951542, lng: 95.32770537603727 },
];
let clicked = 0;

function initMap() {
    // The map, centered at Banda Aceh
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 5.5525640240259575, lng: 95.31438965511126 },
        zoom: 17,
        mapId: "c00b786d13d6a102",
        mapTypeControl: false,
        fullscreenControl: false,
        streetViewControl: false,
    });

    infoWindow = new google.maps.InfoWindow();

    // Variabel untuk mecari lokasi apotek
    search = document.getElementById("search");
    // Variabel untuk mencari posisi sekarang
    loc = document.getElementById("find");
    // Meletakkan posisi icon "find" di kanan bawah
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(loc);

    loc.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    myMarker(map, pos);
                    if (clicked == 0) {
                        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(search);
                    }
                    search.addEventListener("click", () => {
                        drop();
                    });
                    map.setCenter(pos);
                    clicked = 1;
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
    infoWindow.open(map);
}

// Marker lokasi anda
function myMarker(map, pos) {
    defMarker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "You are here",
        icon: {
            url: "../assets/ico/my-location.png",
            scaledSize: new google.maps.Size(40, 40),
        },
    });
}

function drop() {
    clearMarkers();

    for (let i = 0; i < apotek.length; i++) {
        addMarkerWithTimeout(apotek[i], namaApotek[i], i * 200);
    }
}

function addMarkerWithTimeout(position, namaApotek, timeout) {
    window.setTimeout(() => {
        markers.push(
            new google.maps.Marker({
                position: position,
                map,
                title: namaApotek,
                animation: google.maps.Animation.DROP,
            })
        );
    }, timeout);
}

function clearMarkers() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }

    markers = [];
}
